<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'title'     => "required",
                'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            ];
        }
        else{
            return [
                'title'     => "required",
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required' => 'يجب ادخال اسم القسم',
            'image.required' => 'يجب رفع صورة',
        ];
    }}
