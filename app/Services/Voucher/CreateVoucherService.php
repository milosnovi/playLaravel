<?php

namespace App\Services\Voucher;

use App\Http\Requests\VoucherRequest;
use App\Models\DiscountTiers;
use App\Models\Product;
use App\Models\Voucher;

/**
 * Created by PhpStorm.
 * User: milosnovicevic
 * Date: 9/21/18
 * Time: 1:34 PM
 */

class CreateVoucherService {

    /**
     * @param VoucherRequest $request
     * @return bool
     */
    public function createVoucher(VoucherRequest $request)
    {
        $voucher = new Voucher;
        $voucher->star_date = $request->get('star_date');
        $voucher->end_date = $request->get('end_date');

        if($request->get('discount_tier')) {
            $discountTier = DiscountTiers::find($request->get('discount_tier'));
            $voucher->discountTier()->associate($discountTier);
        }

        $voucher->save();

        if($request->get('product_id')) {
            $product = Product::find($request->get('product_id'));
            $voucher->product()->attach($product);
        }

        return $voucher;
    }
}