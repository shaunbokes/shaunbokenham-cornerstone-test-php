<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App
 */
class Order extends Model
{
    public $guarded = [
        'id'
    ];

    protected $table = 'orders';

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
}
