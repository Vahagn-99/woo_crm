<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderProductResource;
use App\Http\Resources\ProductResource;
use App\Models\OrderProduct;
use App\Models\Product;

class ApiController extends Controller
{
    /**
     * Get all the products
     * @return App\Http\Resources\ProductResource
     */
    public function products()
    {
        return ProductResource::collection(Product::get());
    }

    /**
     * Get all the  orders of products
     * @return App\Http\Resources\OrderProductResource
     */
    public function OrderProducts()
    {
        return OrderProductResource::collection(OrderProduct::get());
    }

    /**
     *Get orders of products with product
     * @param  string  $status status type of product
     * @param  string  $has word such need to saerch in json
     * @return App\Http\Resources\OrderProductResource
     */
    public function orderByLineItemId($status = 'publish', $has = 'sandals')
    {
        return OrderProductResource::collection(
            OrderProduct::with([
                'product' => function ($product) use ($status, $has) {
                    $product->statusPublish($status)->whereNameHas($has);
                },
            ])
                ->onlyHasPrice()
                ->onlyHasCost()
                ->orderByDesc('line_item_id')
                ->get()
        );
    }
}
