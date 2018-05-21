Background
----------
From time to time Cornerstone offers limited edition branded gift boxes.
There are three types of gift boxes:

* Shave Cream and Razor Box
* Shave Gel and Razor Box
* Shave Balm and Razor Box

Where possible we try to maintain even levels of stock in case we have a brand event and want to send out a variety of boxes.
A user may purchase any number of the shave boxes on offer. If no box type is selected, assume we will ship one box of which we have the most.
We need to keep a track of what a user orders for billing, and how much stock we have of each box.

Requirements
------------
0. Clone this repository to your github account and push changes there.

1. Implement OrderController::save() method (see php doc for details).

2. Cover CreateOrder service with unit tests.

Help
----
Some files already exist and just need to be completed like the Order Controller.

You don't need to handle any payments, just setting up the order object and classes to place the order.

To setup:

```
$ composer install
$ php artisan migrate --seed
```

To run:

```
$ php artisan serve
Laravel development server started on http://localhost:8000/
```

Placing order form is at http://localhost:8000/orders

Once finished please email us a link to gihthub repository with your solution.
