<?php

namespace App\Models;

class Image extends AbstractModel
{
    /**
     * Image type of product
     *
     * @var int
     */
    const TYPE_NORMAL = 1;
    const TYPE_PREVIEW = 2;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    protected $appends = ['url'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'target_type',
        'target_id',
        'store_name',
        'origin_name',
        'size',
        'type',
    ];

    public function getUrlAttribute()
    {
        return getPublicFile($this->attributes['store_name']);
    }
}
