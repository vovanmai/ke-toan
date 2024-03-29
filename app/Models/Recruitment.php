<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recruitment extends AbstractModel
{
    use Sluggable;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recruitments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'title',
        'short_description',
        'slug',
        'description',
        'active',
        'image',
        'total_view',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

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
