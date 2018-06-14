<?php

use App\Box;
use App\Services\CreateOrder;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateOrderTest extends TestCase
{
    protected $dispatcher;

    public function setUp()
    {
        parent::setUp();

        $this->dispatcher = $this->app->make('App\Services\Dispatcher');
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testGetOrderedBoxDetailsSpecificBox()
    {
        $createOrder = new CreateOrder($this->dispatcher);

        $box = $createOrder->getOrderedBoxDetails(1);
        $this->assertEquals('RZCRM', $box->sku);

        $box = $createOrder->getOrderedBoxDetails(2);
        $this->assertEquals('RZGEL', $box->sku);

        $box = $createOrder->getOrderedBoxDetails(3);
        $this->assertEquals('RXBLM', $box->sku);
    }

    public function testGetOrderedBoxDetailsMostQuantity()
    {
        $createOrder = new CreateOrder($this->dispatcher);
        $box = $createOrder->getOrderedBoxDetails(0);

        $this->assertContains($box->sku, ['RZCRM', 'RZGEL', 'RXBLM']);
    }

    public function testUpdateBoxQuantity()
    {
        $boxId = 1;
        $box = Box::find($boxId);
        $createOrder = new CreateOrder($this->dispatcher);
        $decrementAmount = 1;

        $expectedQuantity = $box->quantity - $decrementAmount;

        $createOrder->updateBoxQuantity(
            $boxId,
            $decrementAmount
        );

        $box = Box::find($boxId);

        $this->assertEquals($expectedQuantity, $box->quantity);
    }

    public function testFormatOrderOutput()
    {
        $createOrder = new CreateOrder($this->dispatcher);

        $orderDetails = [
            'first_name' => 'test',
            'surname' => 'name',
            'address' => 'test address',
            'postcode' => 'TE13ST'
        ];

        $boxDetails = [
            'sku' => 'SKU'
        ];

        $orderData = [
            'Customer' => $orderDetails['first_name'].' '.$orderDetails['surname'],
            'address' => $orderDetails['address'],
            'postcode' => $orderDetails['postcode'],
            'sku' => $boxDetails['sku']
        ];

        $this->assertEquals($orderData, $createOrder->formatOrderOutput(
            $orderDetails,
            $boxDetails
        ));
    }
}
