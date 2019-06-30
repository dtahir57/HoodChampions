<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Category;
use App\Http\Requests\CategoryRequest;
use Session;
use Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $check_category = $this->check_unique_category($request->title, $request->categoryable_type);
        if ($check_category) {
            Session::flash('category_exists', 'Category Already exisits with modal '. $check_category->categoryable_type);
            return redirect()->back();
        }

        $category = new Category;
        $category->title = $request->title;
        $category->categoryable_type = $request->categoryable_type;
        $category->image = $request->image->store('public/categories/');
        $category->is_active = ($request->is_active) ? $request->is_active : 0;
        $category->save();

        if ($category) {
            Session::flash('created', 'Category Created Successfully');
            return redirect()->route('category.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->categoryable_type = $request->categoryable_type;
        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $category->image = $request->image->store('public/categories/');
        }
        $category->is_active = ($request->is_active) ? $request->is_active : 0;
        $category->update();

        if ($category) {
            Session::flash('update', 'Category Updated Successfully');
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryRequest $request)
    {
        $category = Category::find($request->id);
        Storage::delete($category->image);
        $category->delete();
        if ($category) {
            Session::flash('deleted', 'Category Deleted Successfully');
            return redirect()->route('category.index');
        }
    }

    public function check_unique_category($category, $categoryable_type)
    {
        $check_category_if_exists = Category::where([
            ['title', $category],
            ['categoryable_type', $categoryable_type]
        ])->first();
        return $check_category_if_exists;
    }
}
