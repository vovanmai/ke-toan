<?php

namespace App\Http\Requests\Admin;

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
            'company_name' => 'nullable|max:255',
            'company_tax_code' => [
                'nullable',
                'string',
                'max:13',
                'regex:/^([0-9]{10}|[0-9]{13})$/',
            ],
            'hotline' => [
                'nullable',
                new PhoneNumber(),
            ],
            'hotline_name' => [
                'nullable',
                'max:20',
            ],
            'company_email' => 'nullable|email|max:255',
            'company_address' => 'nullable|max:255',
            'company_website_domain' => 'nullable|max:255',
            'link_fan_page_facebook' => 'nullable|max:255',
            'header_banner' => 'nullable|array',
            'header_banner_width' => [
                'nullable',
                'max:20',
                'regex:/^(auto|([1-9]{1}[0-9]{0,}px)|([1-9]{1}[0-9]{0,1}|100)%)$/',
            ],
            'header_banner_height' => [
                'nullable',
                'max:20',
                'regex:/^(auto|([1-9]{1}[0-9]{0,}px)|([1-9]{1}[0-9]{0,1}|100)%)$/',
            ],
            'fb_fan_page_script' => [
                'nullable',
//                new CheckHtmlElement(),
            ],
            'zalo_fan_page_chat_script' => [
                'nullable',
//                new CheckHtmlElement(),
            ],
            'google_map_address_company' => [
                'nullable',
//                new CheckHtmlElement(),
            ],
            'is_remove_header_banner' => 'nullable|boolean'
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
