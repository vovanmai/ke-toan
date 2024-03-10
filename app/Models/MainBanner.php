<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MainBanner extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'main_banners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'title',
        'title_color',
        'short_description',
        'short_description_color',
        'image',
        'active',
        'link',
    ];

    /**
     * Recruitment belong to Admin
     *
     * @return BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function getImageAttribute()
    {
        $data = json_decode($this->attributes['image'], true);

        if ($data) {
            $data['url'] = getPublicFile($data['store_name']);
        }
        return $data;
    }
}
