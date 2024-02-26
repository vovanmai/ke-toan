<?php

namespace App\Http\Requests\Admin;

use App\Rules\CheckHtmlElement;
use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class CreateWebsiteSettingRequest extends FormRequest
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
            'header_slogan' => 'nullable|max:255',
            'footer_slogan' => 'nullable|max:255',
            'footer_fb_fan_page' => [
                'nullable',
                new CheckHtmlElement(),
            ],
            'customer_support_phone' => [
                'nullable',
                new PhoneNumber(),
            ],
            'contact_map' => [
                'nullable',
                new CheckHtmlElement(),
            ],
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => [
                'nullable',
                new PhoneNumber(),
            ],
            'contact_address' => 'nullable|max:255',
            'logo' => 'nullable|max:255',
            'logo_width' => 'nullable|integer|min:1',
            'logo_height' => 'nullable|integer|min:1',
            'fb_chat' => 'nullable',
            'fb_comment_app_id' => 'nullable',
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
