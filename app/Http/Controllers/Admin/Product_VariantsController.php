<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product_variant;
use App\Models\Admin\Product;
use App\Models\Admin\Variant;

class Product_VariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Product_variant::paginate(3);
        return view('admin.product_variants.index', compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $variant = Variant::all();
        return view('admin.product_variants.add', compact('product', 'variant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = new Product_variant;
        $info->product_id=$request->product_id;
        $info->variant_id=$request->variant_id;
        $info->save();
        return redirect()->route('admin.product_variants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infos = Product_variant::find($id);
        return view('admin.product_variants.view', compact('infos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::all();
        $variant = Variant::all();
        $infos = Product_variant::find($id);
        return view('admin.product_variants.edit', compact('infos', 'product', 'variant'));
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
        $info = Product_variant::find($id);
        $info->product_id=$request->product_id;
        $info->variant_id=$request->variant_id;
        $info->save();
        return redirect()->route('admin.product_variants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infos = Product_variant::find($id);
        $infos->delete();
        return redirect()->route('admin.product_variants.index');
    }
}
