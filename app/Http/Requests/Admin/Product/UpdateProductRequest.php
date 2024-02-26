<?php

namespace App\Http\Requests\Admin\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'preview_image' => 'nullable',
            'detail_images' => 'array|nullable|max:10',
            'detail_images.*' => 'nullable',
            'description' => 'required',
            'price' => [
                'required',
                'integer',
                'min:' . Product::MIN_PRICE,
                'max:' . Product::MAX_PRICE,
            ],
            'quantity' => [
                'required',
                'integer',
                'min:' . Product::MIN_QUANTITY,
                'max:' . Product::MAX_QUANTITY,
            ],
            'remove_detail_image_ids' => 'nullable|array',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'price.max' => 'Giá không được lớn hơn 100 triệu',
        ];
    }
}
