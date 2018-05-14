<?php

namespace App\Http\Controllers;

use App\Box;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    public function index()
    {
        $boxes = Box::all();
        return view('order', compact('boxes'));
    }

    public function save()
    {
        // validate input (view needs to display errors)

        // use CreateOrder service to dispatch order to the warehouse

        // store order and order items in the database with Models provided

        // update box quantity in the database with CreateOrder::updateBoxQuantity()

        // display 'thank you' message saying what was ordered

        // cover all this stuff with tests, use dependency injection and mocking
    }
}