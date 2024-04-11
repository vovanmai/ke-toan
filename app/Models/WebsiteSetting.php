<?php

namespace App\Models;

class WebsiteSetting extends AbstractModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'main_menu',
        'company_name',
        'company_tax_code',
        'hotline',
        'hotline_name',
        'company_email',
        'company_address',
        'company_website_domain',
        'header_banner',
        'header_banner_width',
        'header_banner_height',
        'fb_fan_page_script',
        'zalo_fan_page_chat_script',
        'zalo_group_chat',
        'google_map_address_company',
        'link_fan_page_facebook',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'header_banner' => 'array',
        'main_menu' => 'array',
    ];

    public function getHeaderBannerAttribute()
    {
        $data = json_decode($this->attributes['header_banner'], true);

        if ($data) {
            $data['url'] = getPublicFile($data['store_name']);
        }
        return $data;
    }
}
