<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    const FIELD_ID                  = 'id';
    const FIELD_START_DATE          = 'star_date';
    const FIELD_END_DATE            = 'end_date';
    const FIELD_DISCOUNT_TIERS_ID   = 'discount_tier_id';
    const FIELD_AVAILABLE           = 'available';

    const FIELD_DISCOUNT_TIERS  = 'discount_tier';
    const FIELD_PRODUCT         = 'product';

    protected $fillable = [
        self::FIELD_END_DATE,
        self::FIELD_START_DATE,
        self::FIELD_DISCOUNT_TIERS_ID,
        self::CREATED_AT,
        self::UPDATED_AT
    ];


    /**
     * @param $available
     * @return Voucher
     */
    public function setAvailable($available): Voucher
    {
        $this->available = $available;

        return $this;
    }


    public function product()
    {
        return $this->belongsToMany(Product::class, 'products_vouchers')->withTimestamps();
    }

    public function discountTier()
    {
        return $this->belongsTo(DiscountTiers::class);
    }

}
