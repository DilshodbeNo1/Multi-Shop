<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product_attribute;
use App\Models\Admin\Product;
use App\Models\Admin\Attribute;
class Product_AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Product_attribute::paginate(3);
        return view('admin.product_attribute.index', compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $attribute = attribute::all();
        return view('admin.product_attribute.add', compact('product', 'attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = new Product_attribute;
        $info->product_id=$request->product_id;
        $info->attribute_id=$request->attribute_id;
        $info->save();
        return redirect()->route('admin.product_attribute.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infos = Product_attribute::find($id);
        $product = Product::all();
        $attribute = attribute::all();
        return view('admin.product_attribute.view', compact('infos', 'product', 'attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infos = Product_attribute::find($id);
        $product = Product::all();
        $attribute = attribute::all();
        return view('admin.product_attribute.edit', compact('infos', 'product', 'attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $info = Product_attribute::find($id);
        $info->product_id=$request->product_id;
        $info->attribute_id=$request->attribute_id;
        $info->save();
        return redirect()->route('admin.product_attribute.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infos = Product_attribute::find($id);
        $infos->delete();
        return redirect()->route('admin.product_attribute.index');
    }
}
