<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\AdminRequest;
use App\Http\Requests\Dashboard\Admin\UpdateAdminRequest;
use App\Http\Requests\Site\Company\Product\EditProductRequest;
use App\Http\Requests\Site\Company\Product\StoreProductRequest;
use App\Http\Traits\Image;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use Image;
    public function index()
    {
        $admins = Admin::get();
        return view('dashboard.pages.admin.index',compact('admins'));
    }

    public function create()
    {
        return view('dashboard.pages.admin.create');
    }

    public function store(AdminRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $data['image'] = $this->imageUpload('admins',$request->image);
        }
        else
        {
            unset($data['image']);
        }
        $data['password'] = Hash::make($request->password);
        unset($data['_token']);
        $admin = Admin::create($data);

        if(!$admin)
        {
            return abort(404);
        }
        flash('تم الحفظ بنجاح','alert alert-primary');
        return back();
    }

    public function show($id)
    {
        $data = Admin::findOrFail($id);
        return view('dashboard.pages.admin.show',compact('data'));
    }


    public function edit($id)
    {
        $data = Admin::findOrFail($id);
        return view('dashboard.pages.admin.edit',compact('data'));
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $data['image'] = $this->imageUpload('admins',$request->image);
        }
        else
        {
            unset($data['image']);
        }

        if($request->has('password'))
        {
            $data['password'] = Hash::make($request->password);
        }
        else
        {
            unset($data['password']);
        }
        unset($data['_token']);
        $admin->update($data);
        flash('تم التعديل بنجاح','alert alert-success');
        return back();
    }

    public function destroy($id)
    {
        $data = Admin::findOrFail($id);
        $data->delete();
        flash('تم حذف المسؤول بنجاح','alert alert-danger');
        return back();
    }
}
