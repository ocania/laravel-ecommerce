<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $brand = request('brand');
        return [
            'name' => 'required|max:40|min:3',
            'image' => "nullable|min:3|max:250|unique:brands,image,$brand->id",
            'slug' => "required|min:0|max:40|unique:brands,slug,$brand->id"
        ];
    }
}
