<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Client;
use App\Models\Order;
use Auth;
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
  public function activeAccount(Request $request)
  {
    if ($request->isMethod('post')) {
      $data = $request->all();
      //echo "<pre>";print_r($data);die;
      $userId = Auth::user()->id;
       $user = User::where('id',$userId)->where('code',$request->code)->count();
       //return $user;
      if ($user > 0) {
        User::where(['id'=>$userId])->update(['active'=>1]);
        return redirect('/')->with('flash_message_success','تم تفعيل الحساب بنجاح');
      }else{
        return redirect()->back()->with('flash_message_error','الكودة الذي ادخلته غير صحيح');
      }
    
    }

    return view('active_account');   
  }
}//end of controller
