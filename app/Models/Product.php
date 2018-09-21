<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const FIELD_ID          = 'id';
    const FIELD_NAME        = 'name';
    const FIELD_PRICE       = 'price';
    const FIELD_AVAILABLE   = 'available';

    const VOUCHER = 'voucher';

    protected $fillable = [
        self::FIELD_NAME,
        self::FIELD_PRICE,
    ];

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'products_vouchers')->withTimestamps();
    }

    /**
     * @param $available
     * @return Product
     */
    public function setAvailable($available): Product
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return Product
     */
    public function calculateDiscount(): Product
    {
        $discount = 0;

        if(empty($this->vouchers)) {
            return 0;
        }

        /** @var Voucher $voucher */
        foreach($this->vouchers as $voucher) {
            $discount += $voucher->discountTier->value;
        }

        if(60 < $discount) {
            $discount = 60;
        }

        $this->discount = $discount;

        return $this;
    }

    /**
     * @return Product
     */
    public function calculateDiscountedPrice(): Product
    {
        if(empty($this->discount)) {
            $this->priceWithDiscount = $this->price;
        }

        $this->priceWithDiscount = $this->price - ($this->price * $this->discount /100);

        return $this;
    }
}
