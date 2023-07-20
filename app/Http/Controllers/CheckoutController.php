<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        $order=Order::create([
            'client_id'=>auth()->guard('client')->id(),
            'addres'=> $request->addres,
            'region'=> $request->region,
            'phone'=> $request->phone,
            'payment_type'=> $request->payment_type,
            'total_sum'=> $request->total_sum,
        ]); 

        foreach ($request->product_id as $key => $value) {
            OrderItem::create([
                'order_id'=>$order->id, 
                'product_id'=>$value,
                'quantity'=>$request->quantity[$key],
                'amount'=>$request->amount[$key], 
            ]);
        }
        \Cart::clear();
        return redirect()->route('cart')->with('message', 'Product succesfully Checked');
    } 
}
