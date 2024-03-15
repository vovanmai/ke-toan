<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseImage extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'active',
        'admin_id',
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'array',
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
