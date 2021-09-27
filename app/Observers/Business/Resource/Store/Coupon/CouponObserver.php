<?php

namespace App\Observers\Business\Resource\Store\Coupon;

use App\Models\Business\Resource\Store\Coupon\Coupon;

class CouponObserver
{
    /**
     * @param Coupon $storeCoupon
     */
    public function creating(Coupon $storeCoupon )
    {
        $storeCoupon -> resource_id = uniqid();
    }
}
