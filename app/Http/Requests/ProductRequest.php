<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|file|image|mimes:jpg,png',
            'price' => 'required|numeric|not_in:0',
            'price_of_sale' => 'required|numeric|not_in:0',
            'quantity' => 'required|numeric|not_in:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
