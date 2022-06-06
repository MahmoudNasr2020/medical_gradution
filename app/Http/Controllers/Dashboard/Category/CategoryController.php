<?php

namespace App\Http\Controllers\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.pages.category.index',compact('categories'));
    }


    public function create()
    {
        return view('dashboard.pages.category.create');
    }


    public function store(CategoryRequest $request)
    {
        $category = Category::create(['category_name'=>$request->category_name]);
        flash('تم ادخال القسم بنجاح','alert alert-primary');
        return redirect()->route('dashboard.category.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('dashboard.pages.category.edit',compact('data'));
    }


    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = Category::findOrFail($id);
        $data->update(['category_name'=>$request->category_name]);
        flash('تم تعديل القسم بنجاح','alert alert-success');
        return redirect()->route('dashboard.category.index');
    }


    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        flash('تم حذف القسم بنجاح','alert alert-danger');
        return back();
    }
}
