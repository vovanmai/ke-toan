<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Category extends AbstractModel
{
    use Sluggable, HasEagerLimit;

    const MAX_GRADE = 2;
    const MAX_GRADE_COURSE = 1;

    const TYPE_DISPLAY_LIST = 1;
    const TYPE_DISPLAY_GRID = 2;


    const TYPE_POST = 1;
    const TYPE_COURSE = 2;

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
        'show_on_menu',
        'type',
        'display_type',
        'order',
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

    /**
     * Get the posts of category.
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    /**
     * Get the posts of category.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }
}
