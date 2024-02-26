<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends AbstractModel
{
    const TARGET_TYPES = [
        1 => Recruitment::class,
        2 => Post::class,
        3 => Course::class,
    ];

    public static $targetTypes = [
        Recruitment::class => 'Tuyển dụng',
        Post::class => 'Bài viết',
        Course::class => 'Khóa học',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'target_type',
        'target_id',
        'parent_id',
        'name',
        'email',
        'content',
        'admin_id',
        'user_id',
        'active',
    ];

    /**
     * Comment belong to user
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Comment belong to admin
     *
     * @return BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id')->orderBy('id', 'desc');
    }

    /**
     * Get the parent commentable model (post, recruitment).
     */
    public function target()
    {
        return $this->morphTo();
    }
}
