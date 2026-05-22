<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Xác định ai được phép gửi request này
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules validate cho tạo product
     */
    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'slug'        => 'required|string|max:255|unique:products,slug',
            'status'      => 'sometimes|in:draft,published',
        ];
    }

    /**
     * Custom thông báo lỗi
     */
    public function messages(): array
    {
        return [
            'title.required'       => 'Tên sản phẩm không được để trống.',
            'title.max'            => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'description.required' => 'Mô tả sản phẩm không được để trống.',
            'slug.required'        => 'Slug không được để trống.',
            'slug.unique'          => 'Slug đã tồn tại.',
            'status.in'            => 'Trạng thái phải là draft hoặc published.',
        ];
    }
}
