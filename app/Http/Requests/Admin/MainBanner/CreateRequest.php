<?php

namespace App\Http\Requests\Admin\MainBanner;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'nullable|max:255',
            'image' => 'required|array',
            'short_description' => 'nullable|max:255',
            'link' => 'nullable',
            'title_color' => 'nullable',
            'short_description_color' => 'nullable',
            'active' => 'required|boolean',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'link' => 'Đường dẫn'
        ];
    }
}
