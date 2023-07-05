<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'phone' => 'required|max:255',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages(){
        return[
            'name.required'    => "يرجي ادخال اسمك",
            'email.required'   => "يرجي ادخال البريد الالكتروني لنتمكن من التواصل معك",
            'phone.required'   => "يرجي ادخال هاتفك لنتمكن من التواصل معك",
            'subject.required' => "يرجي ادخال موضوع الرسالة",
            'message.required' => "يرجي كتابة رسالتك",
            ];
    }
}
