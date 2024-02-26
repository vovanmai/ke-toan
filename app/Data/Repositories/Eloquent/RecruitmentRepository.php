<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Recruitment;

class RecruitmentRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'recruitments.title', 'operator' => 'like', 'type' => 'normal'],
        'created_at_from' => ['column' => 'recruitments.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'recruitments.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Recruitment::class;
    }
}
