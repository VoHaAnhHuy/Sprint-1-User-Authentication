<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Xác định ai được phép gửi request này
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules validate cho cập nhật product
     */
    public function rules(): array
    {
        $productId = $this->route('product');

        return [
            'title'       => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'slug'        => 'sometimes|string|max:255|unique:products,slug,' . $productId,
            'status'      => 'sometimes|in:draft,published',
        ];
    }

    /**
     * Custom thông báo lỗi
     */
    public function messages(): array
    {
        return [
            'title.max'  => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'slug.unique' => 'Slug đã tồn tại.',
            'status.in'  => 'Trạng thái phải là draft hoặc published.',
        ];
    }
}
