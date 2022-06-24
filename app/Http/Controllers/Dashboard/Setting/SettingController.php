<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Company\Setting\UpdateSetting;
use App\Http\Traits\Image;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use Image;

   public function __construct()
    {
        $this->middleware('permission:الاعدادات', ['only' => ['update']]);
    }
    public function update(UpdateSetting $request)
    {
        $data=[];
        if($request->hasFile('logo'))
        {
            $data['logo'] = $this->imageUpload('settings',$request->logo);
        }
       $data['site_name'] = $request->site_name;
       $data['commission'] = $request->commission;
        Setting::orderBy('id','desc')->update($data);
        flash('تم الحفظ بنجاح','alert alert-primary');
        return back();
    }
}
