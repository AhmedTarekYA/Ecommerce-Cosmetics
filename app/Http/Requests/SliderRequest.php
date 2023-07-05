<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                'title'     => "required|max:255",
                'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
                'sub_title' => "required|max:255",
            ];
        }
        else{
            return [
                'title'     => "required|max:255",
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif,webp',
                'sub_title' => "required|max:255",
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required' => 'يجب ادخال العنوان',
            'sub_title.required' => 'يجب ادخال العنوان الفرعي',
            'image.required' => 'يجب رفع صورة',
        ];
    }
}
