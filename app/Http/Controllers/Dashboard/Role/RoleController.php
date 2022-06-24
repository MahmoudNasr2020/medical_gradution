<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
   public function __construct()
    {
        $this->middleware('permission:عرض-الصلاحية', ['only' => ['index','show']]);
        $this->middleware('permission:اضافة-الصلاحية', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل-الصلاحية', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف-الصلاحية', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('dashboard.pages.roles.role',compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view('dashboard.pages.roles.create',compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ],[
            'name.required'=>'الاسم مطلوب',
            'permission.required'=>'الصلاحية مطلوبة',
            'name.unique'=>'هذا الدور مسجل بالفعل',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        flash('تم الحفظ بنجاح','alert alert-primary');
        return redirect()->route('dashboard.roles.index');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('dashboard.pages.roles.show',compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('dashboard.pages.roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ],[
            'name.required'=>'الاسم مطلوب',
            'permission.required'=>'الصلاحية مطلوبة',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        flash('تم التعديل بنجاح','alert alert-success');
        return redirect()->route('dashboard.roles.index');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        flash('تم الحذف بنجاح','alert alert-danger');
        return redirect()->route('dashboard.roles.index');
    }
}
