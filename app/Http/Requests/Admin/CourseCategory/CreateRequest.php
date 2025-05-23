<?php

namespace App\Http\Requests\Admin\CourseCategory;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'category_id' => 'nullable|integer|exists:categories,id',
            'title' => [
                'required',
                'max:50',
                Rule::unique('categories')->where('type', Category::TYPE_COURSE)
            ],
        ];
    }
}
