<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Attribute;
use App\Models\Admin\Product_image;
use Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Product::paginate(5);
        return view('admin.products.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', '!=', null)->get();
        $attribute = Attribute::all();
        return view('admin.products.add', compact('categories', 'attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->quantity=$request->quantity;
        $product->body=$request->body;
        $product->slug = Str::slug($request->name.$request->price.$product->id);
        $file=$request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('img', $filename);
        $product->image = $filename;
        $product->save();
        $product->attributes()->attach($request->attribute_id);
        $product->variants()->attach($request->variant_id);
        $i = 1;
        foreach ($request->images as $image) {
            $i++;
            $filename =$i.time() . '.' . $image->getClientOriginalExtension();
            $image->move('img', $filename);
            Product_Image::create(['product_id' => $product->id, 'image' => $filename]);
        }
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Product::find($id);
        $category = Category::all();
        return view('admin.products.view', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Product::find($id);
        $category = Category::all();
        return view('admin.products.edit', compact('info', 'category'));
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
        $product = Product::find($id);
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->quantity=$request->quantity;
        $product->body=$request->body;
        $product->slug = Str::slug($request->name);
     
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('img', $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infos = Product::find($id);
        $infos->attributes()->detach();
        $infos->variants()->detach();
        $infos->delete();
        return redirect()->route('admin.products.index');
    }
}
