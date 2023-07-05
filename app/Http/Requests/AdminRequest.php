<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminRequest extends FormRequest
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
        if ($this->id){
            return [
                'email' => "required|unique:admins,email,".$this->id,
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
                'name' => 'required',
                'password' => 'nullable|min:6',
            ];
        }
        else{
            return [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
                'name' => 'required',
                'email' => "required|email|unique:admins",
                'password' => 'required|min:6',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال اسم المشرف',
            'email.required' => 'يجب ادخال البريد الالكتروني',
            'email.unique' => 'هذا البريد مسجل لدينا من قبل',
            'password.required' => 'يرجي ادخال كلمة المرور',
            'password.min' => 'كلمة المرور يجب ان تكون اكبر من :min حرف',
        ];
    }
}
