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

    protected $appends = ['logo'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'header_slogan',
        'footer_slogan',
        'footer_fb_fan_page',
        'customer_support_phone',
        'contact_phone',
        'contact_email',
        'contact_address',
        'contact_map',
        'logo',
        'logo_width',
        'logo_height',
        'fb_chat',
        'total_view',
        'fb_comment_app_id',
    ];

    public function getLogoAttribute()
    {
        $data = json_decode($this->attributes['logo'], true);

        if ($data) {
            $data['url'] = getPublicFile($data['store_name']);
        }
        return $data;
    }
}
