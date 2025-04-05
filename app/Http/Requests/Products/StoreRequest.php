<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        // Asignar las reglas que aplicaremos como validación a los formularios
        return [
            'name_product' => 'required|min:5|max:50',
            'brand_id' => 'required|integer',
            'stock'=> 'required|integer',
            'unit_price' => 'required|decimal:1,2',
            'image' => 'required',
        ];
    }
}
