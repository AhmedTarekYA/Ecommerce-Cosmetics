<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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

        return [
            'title' => "required",
            'desc' => "required",
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'about' => "required",
            'facebook' => "required|url",
            'gmail' => "required|email",
            'whatsapp' => "required",
            'phone' => "required",
//            'order_type' => "required|in:whatsapp,site",
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'يجب ادخال اسم المتجر',
            'about.required' => 'يجب ادخال وصف للمتجر',
            'desc.required' => 'يجب ادخال الجملة الافتتاحية للمتجر',
            'facebook.required' => 'يجب ادخال رابط فيسبوك',
            'facebook.url' => 'تأكد من ان رابط فيسبوك صحيح و يبدأ ب https',
            'gmail.required' => 'يجب ادخال ايميل جيميل',
            'gmail.email' => 'تأكد من ادخال ايميل الجيميل بشكل صحيح',
            'whatsapp.required' => 'يجب ادخال هاتف واتساب',
            'phone.required' => 'يجب ادخال هاتف واتساب',
        ];
    }
}
