<?php

namespace App\Data\Repositories\Eloquent;

use App\Data\Validators\AdminValidator;
use App\Models\Admin;

class AdminRepository extends AppBaseRepository
{

    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'name' => ['column' => 'admins.name', 'operator' => 'like', 'type' => 'normal'],
        'role' => ['column' => 'admins.role', 'operator' => '=', 'type' => 'normal'],
        'email' => ['column' => 'admins.email', 'operator' => 'like', 'type' => 'normal'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Admin::class;
    }
}
