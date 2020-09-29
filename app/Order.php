<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    // todo перенести в транслейт какой-нибудь
    const STATUS_NEW = 'новый';
    const STATUS_CONFIRMED = 'подтверждён';
    const STATUS_COMPLETED = 'завершен';

    public $statuses = [
        0  => self::STATUS_NEW,
        10 => self::STATUS_CONFIRMED,
        20 => self::STATUS_COMPLETED,
    ];

    public function getStatusAttribute($value): string
    {
        return $this->statuses[$value];
    }

    public function countPrice()
    {
        $res = DB::table('products')
            ->selectRaw('sum(products.price * quantity) as price')
            ->join('order_products', 'products.id', '=', 'order_products.id')
            ->where('order_products.order_id', $this->id)
            ->groupBy('order_products.order_id')
            ->first();

        return $res === null ? 0 : $res->price;
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
