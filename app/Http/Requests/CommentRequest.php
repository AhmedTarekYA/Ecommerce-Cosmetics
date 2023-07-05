<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'product_id'  => 'required|exists:products,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'name'        => 'required',
            'desc'        => "required",
            'stars'       => 'required|in:1,2,3,4,5',
        ];
    }
}
