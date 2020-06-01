<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['category_id','name','description','image','purchase_price','sale_price','stock','active'];
	protected $appends = ['profit_percent'];

	public function getProfitPercentAttribute()
    {
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = $profit * 100 / $this->purchase_price;
        return number_format($profit_percent, 2);
    }//end of get profit attribute

    public function category()
    {
        return $this->belongsTo(Category::class);
    }//end fo category

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');
    }//end of orders
}
