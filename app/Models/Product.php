<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends AbstractModel
{
    use Sluggable;

    const MIN_PRICE = 1000;
    const MAX_PRICE = 10000000000;

    const MIN_QUANTITY = 1;
    const MAX_QUANTITY = 1000;

    const MAX_DETAIL_IMAGE = 5;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'discount_id',
        'admin_id',
        'name',
        'slug',
        'preview_image',
        'price',
        'quantity',
        'description',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get documents.
     */
    public function detailImages()
    {
        return $this->morphMany(Image::class, 'target')->where('type', Image::TYPE_NORMAL)
            ->oldest('id');
    }

    /**
     * Product belong to category
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Product belong to discount
     *
     * @return BelongsTo
     */
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'id');
    }

    /**
     * Product belong to discount
     *
     * @return BelongsTo
     */
    public function previewImage()
    {
        return $this->morphOne(Image::class, 'target')->where('type', Image::TYPE_PREVIEW);
    }
}
