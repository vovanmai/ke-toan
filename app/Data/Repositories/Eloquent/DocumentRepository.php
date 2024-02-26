<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Document;

class DocumentRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'documents.title', 'operator' => 'like', 'type' => 'normal'],
        'category_id' => ['column' => 'documents.category_id', 'operator' => '=', 'type' => 'normal'],
        'category_ids' => ['column' => 'documents.category_id', 'operator' => 'in', 'type' => 'normal'],
        'created_at_from' => ['column' => 'documents.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'documents.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Document::class;
    }
}
