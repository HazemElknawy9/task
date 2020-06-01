<?php

use App\models\Category;

if (!function_exists('setting')) {
    function setting() {
        return \App\Setting::orderBy('id', 'desc')->first();
    }
}

if (!function_exists('print_category_name')) {
    function print_category_name($id){
        $categoryName = "";
        $category = Category::find($id);
        if($category){
            $categoryName = $category->name;
        }
        return $categoryName;
  }
}
if (!function_exists('product_count')) {
    function product_count($id){
        $categoryName = "";
        $category = Category::find($id);
        if($category){
            $categoryName = $category->products->count() ;
        }
        return $categoryName;
  }
}