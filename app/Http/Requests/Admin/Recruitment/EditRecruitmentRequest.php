<?php

namespace App\Http\Requests\Admin\Recruitment;

use Illuminate\Foundation\Http\FormRequest;

class EditRecruitmentRequest extends FormRequest
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
            'image' => 'nullable',
            'short_description' => 'nullable|max:255',
            'description' => 'required',
            'comment_type' => 'nullable|in:1,2,3',
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
        ];
    }
}
