<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Attribute;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request){
        if ($request->has('filter')) {
            $variant_id=$request->variant_id;
        }
        
        $products = Product::query();

        if (isset($variant_id)) {
            $products->whereHas('variants', function ($query) use ($variant_id) {
                $query->whereIn('variants.id', $variant_id);
            });
        }

        if (isset($request->minPrice)) {
            $min=$request->minPrice;
            $products->where('price', '>=', $min);        
        }
        if (isset($request->maxPrice)) {
            $max=$request->maxPrice;
            $products->where('price', '<=', $max);    
        }

        $products = $products->paginate(9);
        $attributes=Attribute::all();
        return view('shop', compact('products', 'attributes'));
    }

    public function productByCategory(Request $request, $slug)
    {
        if ($request->has('filter')) {
            $variant_id=$request->variant_id;
        }

        $category = Category::where('slug', $slug)->first();
        
        
        $products = Product::query();

        if (isset($variant_id)) {
            $products->whereHas('variants', function ($query) use ($variant_id) {
                $query->whereIn('variants.id', $variant_id);
            });
        }

        if (isset($request->minPrice)) {
            $min=$request->minPrice;
            $products->where('price', '>=', $min);        
        }
        if (isset($request->maxPrice)) {
            $max=$request->maxPrice;
            $products->where('price', '<=', $max);    
        }

        $products=$products->where('category_id', $category->id)->paginate(9);
        $attributes=Attribute::all();
        return view('shop', compact('products', 'attributes'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::where('category_id', $product->category_id)->get();
        return view('detail', compact('product', 'products'));
    }

}
