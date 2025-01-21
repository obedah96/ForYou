<?php // App\Http\Requests\ProductFormRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_type' => 'required|string|in:cars,electricalAppliances,homeAppliances,realEstate',
            'product_name' => 'required|string|max:255',
            'product_city' => 'required|string|max:255',
            'product_count' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'contact_info' => 'required|string|max:255',
            'delivery' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
