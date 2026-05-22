<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVariantRequest extends FormRequest
{
    /**
     * Xác định ai được phép gửi request này
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules validate cho tạo variant
     */
    public function rules(): array
    {
        return [
            'price'              => 'required|numeric|min:0',
            'position'           => 'sometimes|integer|min:0',
            'compare_at_price'   => 'nullable|numeric|min:0',
            'option_1'           => 'required|string|max:255',
            'option_2'           => 'nullable|string|max:255',
            'option_3'           => 'nullable|string|max:255',
            'inventory_quantity' => 'sometimes|integer|min:0',
            'image_url'          => 'nullable|string|max:2048',
        ];
    }

    /**
     * Custom thông báo lỗi
     */
    public function messages(): array
    {
        return [
            'price.required'    => 'Giá không được để trống.',
            'price.numeric'     => 'Giá phải là số.',
            'price.min'         => 'Giá không được nhỏ hơn 0.',
            'option_1.required' => 'Option 1 không được để trống.',
        ];
    }
}
