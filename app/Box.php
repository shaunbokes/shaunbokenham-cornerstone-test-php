<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public $guarded = [
        'id'
    ];

    protected $table = 'boxes';
}
