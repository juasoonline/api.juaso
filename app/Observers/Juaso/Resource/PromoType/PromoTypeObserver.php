<?php

namespace App\Observers\Juaso\Resource\PromoType;

use App\Models\Juaso\Resource\PromoType\PromoType;

class PromoTypeObserver
{
    /**
     * @param PromoType $promoType
     */
    public function creating( PromoType $promoType )
    {
        $promoType -> resource_id = uniqid();
    }
}
