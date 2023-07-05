<?php

use Illuminate\Support\Facades\Auth;

function getFile($image = null)
{
    if ($image != null) {
        if (!file_exists($image)) {
            return asset('uploads/noImage.gif');
        } else {
            return asset($image);
        }
    } else {
        return asset('uploads/noImage.gif');
    }
}

function getUserImage($image = null)
{
    if ($image != null) {
        if (!file_exists($image)) {
            return asset('uploads/user.gif');
        } else {
            return asset($image);
        }
    } else {
        return asset('uploads/user.gif');
    }
}

function setting() {
//    return \App\Models\Setting::firstorCreate([]);
}

function loggedAdmin($field = null){
    if($field == null)
        return Auth::guard('admin');
    else
        return auth()->guard('admin')->user()->$field;
}

function loggedUser($field = null){
    if($field == null)
        return Auth::guard('user');
    else
        return auth()->guard('user')->user()->$field;
}
