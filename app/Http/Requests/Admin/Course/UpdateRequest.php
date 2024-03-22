<?php

namespace App\Http\Requests\Admin\Course;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'title' => [
                'required',
                'max:255',
                Rule::unique('courses')->ignore(request()->route('id'), 'id'),
            ],
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|array',
            'short_description' => 'nullable|max:255',
            'description' => 'required',
            'active' => 'required|boolean',
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
