<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountTiers extends Model
{
    const FIELD_ID      = 'id';
    const FIELD_VALUE   = 'value';

    protected $fillable = [
        self::FIELD_VALUE
    ];

    public function vouchers()
    {
        return $this->hasOne(Voucher::class);
    }
}
