<?php

namespace App\Services;

use GuzzleHttp\Client as Guzzle;

class Dispatcher
{
    protected $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    /**
     * $orderData ~ [
     *     'CUSTOMER' => 'Cornerstone',
     *     'address_1' => <address_1>,
     *     'address_2' => <address_2>,
     *     'address_postcode' => <address_postcode>,
     *     'lines' => [
     *         'sku' => <quantity>,
     *         ...
     *     ]
     * ];
     *
     * @param array $orderData
     * @return void
     */
    public function createShipment($orderData)
    {
        $response = $this->guzzle->request('POST', $this->getUrl(), [
            'headers' => $this->getHeaders(), 
            'auth' => $this->getCredentials(), 
            'json' => $orderData, 
            'http_errors' => false
        ]);

        $shipment = json_decode($response->getBody());

        if ($response->getStatusCode() !== 200) {
            Log::error('Shipment Unsuccessful', ['shipment' => $shipment]);
        }

        Log::notice('Shipment Successful', ['shipment' => $shipment]);
    }

    protected function getUrl()
    {
        return 'https://mywarehouse.example/shipments';
    }

    protected function getHeaders()
    {
        return [
            'Content-Type: application/json',
        ];
    }

    protected function getCredentials()
    {
        return ['username' => 'password'];
    }
}