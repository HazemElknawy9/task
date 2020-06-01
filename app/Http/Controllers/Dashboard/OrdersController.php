<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
class OrdersController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::whereHas('client',function($q) use ($request){
          return $q->where('name','like','%' . $request->search. '%');
        })->paginate(5);
        //dd($orders);
        return view('dashboard.orders.view_order')->with(compact('orders'));
    }

    public function destroy(Order $order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        }//end of for each

        $order->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.orders.index');
    
    }//end of order

    
}
