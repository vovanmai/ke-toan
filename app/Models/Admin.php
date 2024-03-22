<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Role is supper admin (Full permissions)
     *
     * @var int
     */
    const ROLE_SUPPER_ADMIN = 1;

    /**
     * Role is admin (Full permissions)
     *
     * @var int
     */
    const ROLE_ADMIN = 2;

    /**
     * Role is manager (Create, edit, list)
     *
     * @var int
     */
    const ROLE_MANAGER = 3;

    /**
     * Role is editor (Create, edit, list)
     *
     * @var int
     */
    const ROLE_EDITOR = 4;

    /**
     * Role is viewer (Only view)
     *
     * @var int
     */
    const ROLE_VIEWER = 5;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'avatar' => 'array',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'role_name',
    ];

    public static $roles = [
        self::ROLE_SUPPER_ADMIN => 'Supper admin',
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_MANAGER => 'Manager',
        self::ROLE_EDITOR => 'Editor',
        self::ROLE_VIEWER => 'Viewer',
    ];

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function getRoleNameAttribute()
    {
        return self::$roles[$this->attributes['role'] ?? null] ?? null;
    }

    /**
     * Check is supper admin
     *
     * @return bool
     */
    public function isSupperAdmin()
    {
        return $this->attributes['role'] === self::ROLE_SUPPER_ADMIN;
    }

    /**
     * Check is admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->attributes['role'] === self::ROLE_ADMIN;
    }

    /**
     * Check is manager
     *
     * @return bool
     */
    public function isManager()
    {
        return $this->attributes['role'] === self::ROLE_EDITOR;
    }

    public function getAvatarAttribute()
    {
        $data = json_decode($this->attributes['avatar'], true);

        if ($data) {
            $data['url'] = asset(getPublicFile($data['store_name']));
        }
        return $data;
    }

    /**
     * Get all
     */
    public function orderHistories()
    {
        return $this->morphMany(OrderHistory::class, 'targetable');
    }
}
