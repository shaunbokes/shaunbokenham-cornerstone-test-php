<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $guarded = [
        'id'
    ];

    protected $table = 'orderItems';

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
