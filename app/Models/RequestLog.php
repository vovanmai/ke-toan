<?php

namespace App\Models;

class RequestLog extends AbstractModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'request_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'method',
        'query',
        'ip',
        'user_agent',
    ];
}
