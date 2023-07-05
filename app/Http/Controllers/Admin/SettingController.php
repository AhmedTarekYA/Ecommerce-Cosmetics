<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use UploadFiles;
    public function index(){
        return view('Admin/Setting/index');
    }

    public function update(SettingRequest $request){
        $input = $request->validated();

        if($request->has('logo'))
            $input['logo'] = $this->saveFile($request->logo,'assets/uploads','yes',99);
        else
            unset($input['logo']);

        if($request->has('about_image'))
            $input['about_image'] = $this->saveFile($request->about_image,'assets/uploads','yes',99);
        else
            unset($input['about_image']);

        Setting::first()->update($input);
        toastr('تم تحديث البيانات بنجاح','','');
        return back();
    }
}
