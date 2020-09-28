<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    // todo перенести в транслейт какой-нибудь
    const STATUS_NEW = 'новый';
    const STATUS_CONFIRMED = 'подтверждён';
    const STATUS_COMPLETED = 'завершен';

    public function getStatusAttribute($value): string
    {
        $statuses = [
            0 => self::STATUS_NEW,
            10 => self::STATUS_CONFIRMED,
            20 => self::STATUS_COMPLETED,
        ];

        return $statuses[$value];
    }

    public function countPrice()
    {
        return $this->products()
            ->groupBy('order_products.order_id')
            ->sum('order_products.price');
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }
}
