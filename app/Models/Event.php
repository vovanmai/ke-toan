<?php

namespace App\Models;

class Event extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'color',
        'title',
        'content',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'is_recurrent',
        'is_all_day',
    ];
}
