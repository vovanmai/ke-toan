<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\RequestLog;

class RequestLogRepository extends AppBaseRepository
{

    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'path' => ['column' => 'request_logs.path', 'operator' => '=', 'type' => 'normal'],
        'ip' => ['column' => 'request_logs.ip', 'operator' => 'like', 'type' => 'normal'],
        'created_at_from' => ['column' => 'request_logs.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'request_logs.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return RequestLog::class;
    }
}
