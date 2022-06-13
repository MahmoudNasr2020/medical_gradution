<?php

namespace App\Http\Controllers\Company\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Traits\Image;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Mime\Header\all;

class ProductController extends Controller
{
    use Image;
    public function index()
    {
        $products = Product::where('company_id',Auth::guard('company')->id())->with('category:id,category_name')->get();
        return view('company.pages.product.index',compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('company.pages.product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('image'))
        {
            $image = $this->imageUpload('products',$request->image);
        }

        $product = Product::create([
           'name'=>$request->name,
           'price'=>$request->price,
           'production_country'=>$request->production_country,
           'category_id'=>$request->category_id,
            'company_id'=>Auth::guard('company')->user()->id,
            'image'=>$image,
            'description'=>$request->description,
        ]);

        if(!$product)
        {
           return abort(404);
        }
        flash('تم ادخال المنتج بنجاح','alert alert-primary');
        return redirect()->route('company.product.index');
    }


    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('company.pages.product.show',compact('data'));
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $categories = Category::all();
        return view('company.pages.product.edit',compact('data','categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $data['image'] = $this->imageUpload('products',$request->image);
        }
        else
        {
            unset($data['image']);
        }
        $product->update($data);
        flash('تم تعديل المنتج بنجاح','alert alert-success');
        return redirect()->route('company.product.index');
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        flash('تم حذف المنتج بنجاح','alert alert-danger');
        return back();
    }
}
