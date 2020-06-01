<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use DB;
use Session;

class OrderController extends Controller
{
    public function create(Client $client)
    {
        $categories = Category::with('products')->get();
        $orders = $client->orders()->with('products')->paginate(5);
        //return $orders;
        return view('dashboard.clients.orders.create', compact( 'client', 'categories', 'orders'));

    }//end of create

    public function store(Request $request, Client $client)
    {
        //return $request;
        $request->validate([
            'products' => 'required|array',
        ]);
        foreach ($request->products as $id => $quantity) {

            $product = Product::FindOrFail($id);  
            
            if ($product->stock < $quantity['quantity']) {
                Toastr::error('رصيد'.$product->name.'لايسمح' ,'خطأ');
                return redirect('/dashboard/clients/'.$client->id.'/orders/create');
            }else{
               $this->attach_order($request, $client);
                session()->flash('success', __('site.added_successfully'));
                if($request->payment_method == "COD"){
                    return redirect()->route('dashboard.orders.index');
                }else {
                    return redirect('/dashboard/paypal/thanks');
                }    
            }
        }//end of foreach

        
    }//end of store

    public function thanksPaypal(){
       // $lastInsertOrder = Order::
        return view('dashboard.orders.thanks_paypal');
    }

    public function paypal()
    {
         return view('dashboard.orders.paypal');
    }

    public function cancelPaypal(){
        return view('dashboard.orders.cancel_paypal');
    }

    public function edit(Client $client, Order $order)
    {
        $categories = Category::with('products')->get();
        $orders = $client->orders()->with('products')->paginate(5);
        return view('dashboard.clients.orders.edit', compact('client', 'order', 'categories', 'orders'));

    }//end of edit

    public function update(Request $request, Client $client, Order $order)
    {
        $request->validate([
            'products' => 'required|array',
        ]);

        $this->detach_order($order);

        $this->attach_order($request, $client);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.orders.index');

    }//end of update

    private function attach_order($request, $client)
    {
        $order = $client->orders()->create([]);
        
        $order->products()->attach($request->products);

        $total_price = 0;

        foreach ($request->products as $id => $quantity) {

            $product = Product::FindOrFail($id);
            if (!empty($request->dicount)) {
                $total_price += ($product->sale_price * $quantity['quantity']) - $request->dicount;
            }else{
                $total_price += $product->sale_price * $quantity['quantity'];
            }
            
            $product->update([
                'stock' => $product->stock - $quantity['quantity']
            ]);

        }//end of foreach

        $order->update([
            'total_price' => $total_price,
            'discount' => $request->dicount
        ]);

        Session::put('order_id',$order->id);
        Session::put('grand_total',$total_price);

    }//end of attach order

    private function detach_order($order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        }//end of for each

        $order->delete();

    }//end of detach order

    public function products(Order $order)
  {
    //return $order;
    $products = $order->products;
    //return $products;
    return view('dashboard.orders._products', compact('order', 'products'));
  }//end of products
}//end of controller
