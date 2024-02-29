<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class Category extends AbstractModel
{
    use Sluggable;

    const MAX_GRADE = 3;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'parent_id',
        'active',
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
     * Get the user that owns the phone.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }

    /**
     * Get the posts of category.
     */
    public function activePosts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id')
            ->where('active', '=', true);
    }

    /**
     * Get the posts of category.
     */
    public function inactivePosts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id')
            ->where('active', '=', false);
    }
}
