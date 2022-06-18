<?php

namespace App\Http\Controllers\Site\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\User\Profile\UpdateProfileRequest;
use App\Http\Traits\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use Image;
    public function update(UpdateProfileRequest $request)
    {

        $user = User::findOrFail($request->id);
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
            $data['image'] = $this->imageUpload('users',$request->image);
        }
        else
        {
            unset($data['image']);
        }

        $user->update($data);
        return back()->with(['msgupdate'=>'success']);
    }
}
