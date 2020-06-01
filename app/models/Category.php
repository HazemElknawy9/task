<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','active'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }//end of products
}
