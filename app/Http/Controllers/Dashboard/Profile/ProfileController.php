<?php

namespace App\Http\Controllers\Dashboard\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Profile\UpdateProfileRequest;
use App\Http\Traits\Image;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use Image;
    public function update(UpdateProfileRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $data = $request->all();
        if($request->filled('password'))
        {
            $data['password'] = Hash::make($request->password);
        }
        else
        {
            unset($data['password']);
        }
        if ($request->hasFile('image'))
        {
            $data['image'] = $this->imageUpload('admins',$request->image);
        }
        else
        {
            unset($data['image']);
        }

        $admin->update($data);
        flash('تم تعديل البيانات بنجاح','alert alert-success');
        return back();
    }
}
