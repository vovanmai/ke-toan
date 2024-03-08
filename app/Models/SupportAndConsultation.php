<?php

namespace App\Models;

class SupportAndConsultation extends AbstractModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'support_and_consultation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'content',
        'is_read',
    ];
}
