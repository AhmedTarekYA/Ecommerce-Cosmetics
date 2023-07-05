<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use UploadFiles;
    public function index(){
        if (Auth::guard('user')->check()){
            return redirect('profile');
        }
        return view('Site/Auth/Login');
    }


    public function register(){
        if (Auth::guard('user')->check()){
            return redirect('profile');
        }
        return view('Site/Auth/Register');
    }

    public function userRegister(UserRegisterRequest $request){
        $validatedData = $request->validated();

        if($request->has('image'))
            $validatedData['image'] = $this->saveFile($request->image,'assets/uploads/users','yes',70);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);
        if ($user){
            Auth::guard('user')->login($user);
            return response()->json([
                'status' => 200,
                'name'   => $validatedData['name']
            ]);
        }
    }

    public function postLogin(request $request){
        $data = $request->validate([
            'email'   =>'required|exists:users',
            'password'=>'required'
        ],[
            'email.exists'      => 'البريد الالكتورني غير مسجل',
            'email.required'    => 'يجب ادخال البريد الالكتورني',
            'password.required' => 'يجب ادخال كلمة المرور'
        ]);
        if (Auth::guard('user')->attempt($data)){
            return response()->json([
                'status' => 200,
                'name'   => auth('user')->user()->name
            ]);
        }
        return response()->json(405);
    }

    public function logout(){
        auth('user')->logout();
        toastr()->info("تم تسجيل الخروج بنجاح");
        return redirect('login');
    }
}
