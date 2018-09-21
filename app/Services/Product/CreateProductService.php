<?php

namespace App\Services\Product;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\VoucherRequest;
use App\Models\Product;

/**
 * Created by PhpStorm.
 * User: milosnovicevic
 * Date: 9/21/18
 * Time: 1:34 PM
 */

class CreateProductService {

    /**
     * @param VoucherRequest $request
     * @return bool
     */
    public function craeteProduct(ProductCreateRequest $request)
    {

        $product = new Product();
        $product->price = $request->get('price');
        $product->name = $request->get('name');

        $product->save();

        return $product;
    }
}