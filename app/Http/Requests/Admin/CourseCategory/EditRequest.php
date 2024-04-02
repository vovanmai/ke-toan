<?php

namespace App\Http\Requests\Admin\CourseCategory;

use App\Models\Category;
use App\Rules\CheckSelfParentCat;
use App\Services\Admin\CommonService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditRequest extends FormRequest
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
            'category_id' => [
                'nullable',
                'integer',
                'exists:categories,id',
                new CheckSelfParentCat($this->route()->id),
            ],
            'title' => [
                'required',
                'max:50',
                Rule::unique('categories')->where('type', Category::TYPE_COURSE)->ignore($this->route('id'))
            ],
        ];
    }
}
