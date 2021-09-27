<?php

namespace App\Observers\Business\Resource\Product\Promotion;

use App\Models\Business\Resource\Product\Promotion\Promotion;

class PromotionObserver
{
    /**
     * @param Promotion $promotion
     */
    public function creating( Promotion $promotion )
    {
        $promotion -> resource_id = uniqid();
    }
}
