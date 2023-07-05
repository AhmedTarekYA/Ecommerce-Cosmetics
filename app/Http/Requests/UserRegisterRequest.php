<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(auth()->check()){
            return [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
                'email' => 'required|email|max:255|unique:users,email,'.loggedUser('id'),
                'password' => 'nullable|min:8|confirmed',
                'address' => 'required',
                'name' => 'required|string|max:255',
            ];
        }
        else{
            return [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|min:8',
                'address' => 'required',
                'name' => 'required|string|max:255',
            ];
        }

    }

    public function messages(){
        return [
          'image.mimes' => 'صيغة الصورة غير مدعومة',
          'email.required' => 'يرجي ادخال البريد الالكتروني',
          'email.unique' => 'هذا البريد مسجل لدينا من قبل',
          'password.required' => 'يرجي ادخال كلمة المرور',
          'password.min' => 'الحد الادني لكلمة المرور 8 احرف او ارقام',
          'password.confirmed' => 'يرجي تأكيد كلمة المرور',
          'address.required' => 'يرجي ادخال العنوان',
          'name.required' => 'يرجي ادخال اسمك',
        ];
    }
}
