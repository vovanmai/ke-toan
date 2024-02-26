<?php

namespace App\Http\Requests\Admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
            ],
            'color' => [
                'required',
                'max:50',
            ],
            'content' => [
                'nullable',
            ],
            'start_date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'start_time' => [
                'nullable',
                'max:5',
            ],
            'end_date' => [
                'nullable',
                'date_format:Y-m-d',
            ],
            'end_time' => [
                'nullable',
                'max:5',
            ],
            'is_recurrent' => [
                'required',
                'boolean',
            ],
            'is_all_day' => [
                'required',
                'boolean',
            ],
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
            'title' => 'Sự kiện'
        ];
    }
}
