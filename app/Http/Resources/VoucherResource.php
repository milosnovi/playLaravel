<?php

namespace App\Http\Resources;

use App\Models\Voucher;
use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
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
            Voucher::FIELD_ID               => $this->id,
            Voucher::FIELD_START_DATE       => $this->star_date,
            Voucher::FIELD_END_DATE         => $this->end_date,
            Voucher::FIELD_DISCOUNT_TIERS   => new DiscountTierResource($this->discountTier),
            Voucher::CREATED_AT             => $this->created_at->format("Y-m-d H:i:s"),
            Voucher::UPDATED_AT             => $this->updated_at->format("Y-m-d H:i:s")
        ];
    }
}
