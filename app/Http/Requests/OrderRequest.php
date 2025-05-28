<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'client_id' => 'required|numeric|exists:clients,id',
            'items' => 'required|array',
            'items.*.product_id' => 'required|numeric|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'delivery_price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
            'notes' => 'required|string|max:220',
            'address' => 'required|string|max:220',
            'payment' => 'required|in:visa,cash',


        ];
    }
}
