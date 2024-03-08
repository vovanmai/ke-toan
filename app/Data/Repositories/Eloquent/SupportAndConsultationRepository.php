<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\SupportAndConsultation;

class SupportAndConsultationRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'name' => ['column' => 'support_and_consultation.name', 'operator' => 'like', 'type' => 'normal'],
        'phone' => ['column' => 'support_and_consultation.phone', 'operator' => 'like', 'type' => 'normal'],
        'is_read' => ['column' => 'support_and_consultation.is_read', 'operator' => '=', 'type' => 'normal'],
        'created_at_from' => ['column' => 'support_and_consultation.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'support_and_consultation.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return SupportAndConsultation::class;
    }
}
