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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use Image;

   public function __construct()
    {
        $this->middleware('permission:عرض-المسؤول',   ['only' => ['index','show']]);
        $this->middleware('permission:اضافة-المسؤول', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل-المسؤول', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف-المسؤول',   ['only' => ['destroy']]);
    }

    public function index()
    {
        $admins = Admin::get();
        return view('dashboard.pages.admin.index',compact('admins'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('dashboard.pages.admin.create',compact('roles'));
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
        $admin->assignRole($request->input('roles'));
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
        $roles = Role::pluck('name','name')->all();
        $userRole = $data->roles->pluck('name','name')->all();
        return view('dashboard.pages.admin.edit',compact('data','roles','userRole'));
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
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $admin->assignRole($request->input('roles'));
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
