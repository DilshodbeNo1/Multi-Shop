<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product_image;
use App\Models\Admin\Product;
class Product_ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Product_image::latest()->paginate(5);
        return view('admin.product_images.index', compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = Product::all();
        return view('admin.product_images.add', compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infos = new Product_image;
        $infos->product_id=$request->product_id;
        $file=$request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('img', $filename);
        $infos->image = $filename;
        $infos->save();
        return redirect()->route('admin.product_images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infos = Product_image::find($id);
        return view('admin.product_images.view', compact('infos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infos = Product_image::find($id);
        return view('admin.product_images.edit', compact('infos'));
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
        $info = Product_image::find($id);
        $info->product_id=$request->product_id;
        if ($request->hasFile('image')) {
            $file=$request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('img', $filename);
            $info->image = $filename;
        }
        $info->save();
        return redirect()->route('admin.product_images.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infos = Product_image::find($id);
        $infos->delete();
        return redirect()->route('admin.product_images.index');
    }
}
