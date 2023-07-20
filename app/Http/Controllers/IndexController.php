<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;

class IndexController extends Controller
{
    public function index(){
        $latestproducts=Product::latest()->get();
        $products=Product::paginate(8);
        $category=Category::where('parent_id', !null)->withCount('products')->paginate(12);
        return view('index', compact('category', 'latestproducts', 'products'));
    }

  

}
