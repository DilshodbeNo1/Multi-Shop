<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(5);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::where('parent_id', null)->get();
        return view('admin.category.add', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $category = new Category;
        $category->parent_id=$request->parent_id;
        $category->name=$request->name;
        $category->slug = Str::slug($request->name);
        $file=$request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('img', $filename);
        $category->image = $filename;
        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.view', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $parent = Category::where('parent_id', null)->get();
        return view('admin.category.edit', compact('category', 'parent'));
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
        $info = Category::find($id);
        $info->parent_id=$request->parent_id;
        $info->name=$request->name;
        $info->slug = Str::slug($request->name . $request->parent_id);
     
        if ($request->hasFile('image')) {
            $file=$request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('img', $filename);
            $info->image = $filename;
        }
        $info->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infos = Category::find($id);
        $infos->products()->delete();
        $infos->delete();
        return redirect()->route('admin.category.index');
    }
}
