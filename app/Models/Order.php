<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends AbstractModel
{

    /**
     * Status is pending
     */
    const STATUS_PENDING = 1;

    /**
     * Status is verified
     */
    const STATUS_VERIFIED = 2;

    /**
     * Status is shipping
     */
    const STATUS_SHIPPING = 3;

    /**
     * Status is delivered
     */
    const STATUS_DELIVERED = 4;

    /**
     * Status is canceled
     */
    const STATUS_CANCELED = 5;

    /**
     * Method payment is cash
     */
    const METHOD_PAYMENT_CASH = 1;

    /**
     * Method payment is bank transfer
     */
    const METHOD_PAYMENT_BANK_TRANSFER = 2;

    /**
     * Order status
     *
     * @var array
     */
    public static $status = [
        self::STATUS_PENDING => "Đang chờ xử lý",
        self::STATUS_VERIFIED => "Đã xác nhận",
        self::STATUS_SHIPPING => "Đang giao hàng",
        self::STATUS_DELIVERED => "Đã giao hàng",
        self::STATUS_CANCELED => "Đã hủy",
    ];

    /**
     * Method payment
     *
     * @var array
     */
    public static $paymentMethods = [
        self::METHOD_PAYMENT_CASH => "Tiền mặt",
        self::METHOD_PAYMENT_BANK_TRANSFER => "Chuyển khoản ngân hàng",
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'code',
        'status',
        'payment_method',
        'sub_total',
        'tax',
        'ship_fee',
        'total',
        'name',
        'email',
        'phone_number',
        'ship_address',
        'note',
    ];

    /**
     * Order belong to User
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Order hasMany Order histories
     *
     * @return BelongsTo
     */
    public function orderHistories()
    {
        return $this->hasMany(OrderHistory::class, 'order_id', 'id')
            ->orderBy('changed_at', 'ASC');
    }

    /**
     * Order has many products
     *
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id');
    }

    /**
     * Is pending
     *
     * @return BelongsTo
     */
    public function isPendding()
    {
        return $this->attributes['status'] == self::STATUS_PENDING;
    }

    /**
     * Is verified
     *
     * @return BelongsTo
     */
    public function isVerified()
    {
        return $this->attributes['status'] == self::STATUS_VERIFIED;
    }

    /**
     * Is shipping
     *
     * @return BelongsTo
     */
    public function isShipping()
    {
        return $this->attributes['status'] == self::STATUS_SHIPPING;
    }

    /**
     * Is delivered
     *
     * @return BelongsTo
     */
    public function isDelivered()
    {
        return $this->attributes['status'] == self::STATUS_DELIVERED;
    }

    /**
     * Is canceled
     *
     * @return boolean
     */
    public function isCanceled()
    {
        return $this->attributes['status'] == self::STATUS_CANCELED;
    }
}
