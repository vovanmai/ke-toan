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
        'hotline',
        'company_email',
        'company_address',
        'company_website_domain',
        'header_banner',
        'header_banner_width',
        'header_banner_height',
        'fb_fan_page_script',
        'google_map_address_company',
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
