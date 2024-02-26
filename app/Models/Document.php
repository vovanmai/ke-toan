<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends AbstractModel
{
    use Sluggable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'admin_id',
        'title',
        'short_description',
        'slug',
        'description',
        'active',
        'total_view',
        'comment_type',
        'is_free',
        'price',
        'preview_file',
        'file',
        'total_page',
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
     * Product belong to category
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
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

    public function getPreviewFileAttribute()
    {
        $data = json_decode($this->attributes['preview_file'], true);

        if ($data) {
            $data['url'] = '/assets/admin/dist/img/pdf.png';
        }
        return $data;
    }

    public function getFileAttribute()
    {
        $data = json_decode($this->attributes['file'], true);

        $file = [
            'pdf' => '/assets/admin/dist/img/pdf.png',
            'doc' => '/assets/admin/dist/img/doc.jpg',
            'docx' => '/assets/admin/dist/img/doc.jpg',
            'zip' => '/assets/admin/dist/img/zip.png',
        ];

        if ($data) {
            $data['url'] = $file[$data['extension']];
            $data['store_url'] = getFileContainFolder() . '/' . $data['store_name'];
        }
        return $data;
    }
}
