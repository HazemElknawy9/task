<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Client;
use App\Models\Order;

class WelcomeController extends Controller
{
  public function index()
  {
  	$users = User::whereRoleIs('admin')->count();
    $categories = Category::count();
    $products = Product::count();
    $clients = Client::count();
    $orders = Order::count();
  	$sales_data = Order::select(
      DB::raw('YEAR(created_at) as year'),
      DB::raw('MONTH(created_at) as month'),
      DB::raw('SUM(total_price) as sum')
    )->groupBy('month')->get();
    //return $sales_data;
    return view('dashboard.welcome')->with(compact('users','categories','products','clients','orders','sales_data'));   
  }//end of index    
}//end of controller
