<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariantRequest extends FormRequest
{
    /**
     * Xác định ai được phép gửi request này
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules validate cho cập nhật variant
     */
    public function rules(): array
    {
        return [
            'price'              => 'sometimes|numeric|min:0',
            'position'           => 'sometimes|integer|min:0',
            'compare_at_price'   => 'nullable|numeric|min:0',
            'option_1'           => 'sometimes|string|max:255',
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
            'price.numeric' => 'Giá phải là số.',
            'price.min'     => 'Giá không được nhỏ hơn 0.',
        ];
    }
}
