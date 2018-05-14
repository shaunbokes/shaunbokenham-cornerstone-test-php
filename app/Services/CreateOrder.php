<?php

namespace App\Services;

use App\Box;

/**
 * Class CreateOrder
 * @package App\Services
 */
class CreateOrder
{
    protected $dispatcher;

    /**
     * CreateOrder constructor.
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Retrieves the details of the box selected
     * If box id is equal 0 the box with the highest level of stock is selected
     *
     * @param integer $boxId
     * @return mixed
     */
    public function getOrderedBoxDetails($boxId)
    {
        if ($boxId <> 0) {
            $boxDetails = Box::where('id', $boxId)->first();

            return $boxDetails;
        }
        $boxDetails = Box::where('quantity', Box::max('quantity'))->first();

        return $boxDetails;
    }

    /**
     * Updates the quantity by decrementing
     *
     * @param integer $id
     * @param integer $quantity
     * @return mixed
     */
    public function updateBoxQuantity($id, $quantity)
    {
        return \DB::table('boxes')->where('id', $id)->decrement('quantity', $quantity);
    }

    /**
     * Formats the order into an array
     *
     * @param array $orderDetails
     * @return array
     */
    public function formatOrderOutput($orderDetails, $boxDetails)
    {
        $orderData = [
            'Customer' => $orderDetails['first_name'].' '.$orderDetails['surname'],
            'address' => $orderDetails['address'],
            'postcode' => $orderDetails['postcode'],
            'sku' => $boxDetails['sku']
        ];

        return $orderData;
    }

    /**
     * Processes order via dispatcher class
     *
     * @param $orderData
     */
    public function sendOrder($orderData)
    {
        $this->dispatcher->createShipment($orderData);
    }
}
