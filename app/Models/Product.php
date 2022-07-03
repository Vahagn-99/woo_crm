<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    /**
     * get relationship
     * @return App\Models\OrderProduct
     */
    public function OrderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'product_id', 'id');
    }

    /**
     * @param string $status
     * @param object Builder $query
     * @return App\Models\OrderProduct
     */
    public function scopeStatusPublish($query, $status = 'publish')
    {
        return $query->where('payload->status', 'LIKE', strtolower($status));
    }

    /**
     * @param string $needle
     * @param object Builder $query
     * @return App\Models\OrderProduct
     */
    public function scopeWhereNameHas($query, $needle = 'sandals')
    {
        return $query->where(
            'payload->name',
            'LIKE',
            '%' . ucfirst($needle) . '%'
        );
    }
}
