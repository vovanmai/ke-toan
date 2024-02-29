<?php

namespace App\Http\Requests\Admin\Document;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'required|max:255',
            'description' => 'required',
            'preview_file' => 'nullable',
            'detail_images' => 'nullable',
            'remove_detail_image_ids' => 'nullable|array',
            'is_free' => 'nullable',
            'price' => 'integer|min:1000|max:10000000',
            'file' => 'nullable',
            'total_page' => 'required',
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
