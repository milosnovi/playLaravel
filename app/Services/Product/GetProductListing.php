<?php

namespace App\Services\Product;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\VoucherRequest;
use App\Models\Product;
use App\Models\Voucher;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: milosnovicevic
 * Date: 9/21/18
 * Time: 1:34 PM
 */

class GetProductListing {

    /**
     * @param VoucherRequest $request
     * @return bool
     */
    public function getProductListing()
    {

        $products = Product::with(
            ['vouchers' => function($q) {
                $q->where(Voucher::FIELD_END_DATE, '>', Carbon::now());
                $q->where(Voucher::FIELD_START_DATE, '<', Carbon::now());
                $q->where(Voucher::FIELD_AVAILABLE, 1);
            }, 'vouchers.discountTier'])
            ->where('products.available', 1)
            ->get()
        ;

        /** @var Product $product */
        foreach($products as $product) {
            $product->calculateDiscount();
            $product->calculateDiscountedPrice();
        }

        return $products;

    }
}