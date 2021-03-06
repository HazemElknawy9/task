<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['name','phone','address','email','image'];

    protected $casts = [
        'phone' => 'array'
    ];
}
