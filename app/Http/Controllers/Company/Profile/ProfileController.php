<?php

namespace App\Http\Controllers\Company\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Company\Profile\UpdateProfileRequest;
use App\Http\Traits\Image;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use Image;
    public function update(UpdateProfileRequest $request,$id)
    {
        $company = Company::findOrFail($id);
        $data = $request->all();
        if($request->has('password'))
        {
            $data['password'] = Hash::make($request->password);
        }
        else
        {
            unset($data['password']);
        }
        if ($request->hasFile('image'))
        {
            $data['image'] = $this->imageUpload('companies',$request->image);
        }
        else
        {
            unset($data['image']);
        }

        $company->update($data);
        flash('تم تعديل البيانات بنجاح','alert alert-success');
        return back();
    }
}
