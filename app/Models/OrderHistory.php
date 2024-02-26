<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderHistory extends AbstractModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_histories';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'order_id',
        'note',
        'updatable_type',
        'updatable_id',
        'changed_at',
    ];

    /**
     * Get the parent targetable model (Admin or User).
     */
    public function updatable()
    {
        return $this->morphTo();
    }

    /**
     * Order belong to User
     *
     * @return BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * Is pending
     *
     * @return BelongsTo
     */
    public function isPendding()
    {
        return $this->attributes['status'] == Order::STATUS_PENDING;
    }

    /**
     * Is verified
     *
     * @return BelongsTo
     */
    public function isVerified()
    {
        return $this->attributes['status'] == Order::STATUS_VERIFIED;
    }

    /**
     * Is shipping
     *
     * @return BelongsTo
     */
    public function isShipping()
    {
        return $this->attributes['status'] == Order::STATUS_SHIPPING;
    }

    /**
     * Is delivered
     *
     * @return BelongsTo
     */
    public function isDelivered()
    {
        return $this->attributes['status'] == Order::STATUS_DELIVERED;
    }

    /**
     * Is canceled
     *
     * @return boolean
     */
    public function isCanceled()
    {
        return $this->attributes['status'] == Order::STATUS_CANCELED;
    }
}
