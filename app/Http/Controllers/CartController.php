<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;


class CartController extends Controller
{
    public function index(){
        $items=\Cart::getContent(); 
        return view('cart', compact('items'));
    }

    public function addCart(Request $request)
    {
        $product = Product::find($request->product_id);
        $quantity=$request->quantity ?? 1;
        \Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'quantity'=>$quantity,

        ]);
        return redirect()->route('cart')->with('message', 'Product succesfully added');
    }

    public function remove($id)
    {
        \Cart::remove($id);
        return redirect()->route('cart')->with('message', 'Product succesfully deleted');
    }

    public function update(Request $request)
    {
        foreach ($request->quantity as $key => $quantity) {
            \Cart::update($request['product_id'][$key], array(
                'quantity' => array(
                    'relative'=>false,
                    'value'=>$quantity
                ),
            ));
        }
        return back()->with('message', 'Product succesfully updated!');
    }

}
