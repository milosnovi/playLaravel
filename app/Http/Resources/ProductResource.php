<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            Product::FIELD_ID       => $this->id,
            Product::FIELD_PRICE    => $this->price,
            Product::FIELD_NAME     => $this->name,
            Product::VOUCHER        => VoucherResource::collection($this->vouchers),
            Product::CREATED_AT     => $this->created_at->format("Y-m-d H:i:s"),
            Product::UPDATED_AT     => $this->updated_at->format("Y-m-d H:i:s")
        ];
    }
}
