<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        if (Auth::guard('admin')->check()){
            return redirect('admin');
        }
        return view('Admin.Auth.login');
    }

    public function doLogin(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        if (Auth::guard('admin')->attempt($data)){
            return response()->json(200);
        }
        return response()->json(405);
    }

    public function logout(){
        loggedAdmin()->logout();
        toastr()->info('تم تسجيل الخروج بنجاح','الي اللقاء');
        return redirect('admin/login');
    }
}
