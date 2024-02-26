<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\User;

class UserRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'phone' => ['column' => 'users.phone', 'operator' => 'like', 'type' => 'normal'],
        'name' => ['column' => 'users.name', 'operator' => 'like', 'type' => 'normal'],
        'email' => ['column' => 'users.email', 'operator' => 'like', 'type' => 'normal'],
        'created_at_from' => ['column' => 'users.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'users.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }
}
