<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Models\Voucher;

/**
 * Created by PhpStorm.
 * User: milosnovicevic
 * Date: 9/21/18
 * Time: 1:34 PM
 */

class BuyProduct {

    /**
     * @param Product $product
     * @return Product
     */
    public function buy(Product $product): Product
    {
        $product->setAvailable(0);
        $product->save();

        Voucher::whereHas('product', function ($query) use ($product) {
                $query->where('products.id', $product->id);
            })
            ->update([Voucher::FIELD_AVAILABLE => 0])
        ;

        return $product;
    }
}