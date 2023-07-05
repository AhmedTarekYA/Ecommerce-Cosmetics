<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
                'title'        => 'required|string|max:255|unique:products,title,'.$this->id,
                'desc'         => 'required',
                'price_before' => 'required|numeric|min:0.01',
                'price_after'  => 'nullable|numeric',
                'reviews_num'  => 'nullable|numeric|integer',
                'stars'        => 'required|in:1,2,3,4,5',
                'category_id'  => 'required|exists:categories,id',
            ];
        }
        else{
            return [
                'image'        => 'required|image|mimes:jpeg,png,jpg,gif,webp',
                'title'        => 'required|unique:products,title|string|max:255',
                'desc'         => 'required',
                'price_before' => 'required|numeric|min:0.01',
                'price_after'  => 'nullable|numeric',
                'reviews_num'  => 'nullable|numeric|integer',
                'stars'        => 'required|in:1,2,3,4,5',
                'category_id'  => 'required|exists:categories,id',
            ];
        }
    }
}
