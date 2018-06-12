<?php

namespace App\Http\Controllers;

use App\Box;
use App\Services\CreateOrder;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    protected $createOrderService;

    public function __construct(CreateOrder $createOrder)
    {
        $this->middleware('auth');

        $this->createOrderService = $createOrder;
    }

    public function index()
    {
        $boxes = Box::all();

        return view('order', compact('boxes'));
    }

    public function save(Request $request)
    {
        // validate input (view needs to display errors)
        $validData = $this->validate($request, [
            'boxes' => 'required|integer|max:255',
            'first_name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'postcode' => 'required|max:10',
        ]);

        // use CreateOrder service to dispatch order to the warehouse
        $this->createOrderService->sendOrder(
            $this->createOrderService->formatOrderOutput(
                $request->all(),
                $this->createOrderService->getOrderedBoxDetails($request->input('boxes'))
            )
        );

        // store order and order items in the database with Models provided

        // update box quantity in the database with CreateOrder::updateBoxQuantity()

        // display 'thank you' message saying what was ordered

        // cover all this stuff with tests, use dependency injection and mocking
    }
}
