<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_products';

    /**
     * get relationship
     * @return App\Models\Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * get relationship
     * @return App\Models\Product
     */
    public function parentProduct()
    {
        return $this->hasOne(Product::class, 'parent_product_id', 'id');
    }
    /**
     *get order_products whit price > 0
     *@param object Builder $query
     * @return App\Models\OrderProduct
     */
    public function scopeOnlyHasPrice($query)
    {
        return $query->where('price', '>', 0);
    }

    /**
     *get order_products whit cost > 0
     *@param object Builder $query
     * @return App\Models\OrderProduct
     */
    public function scopeOnlyHasCost($query)
    {
        return $query->where('cost', '>', 0);
    }
}
