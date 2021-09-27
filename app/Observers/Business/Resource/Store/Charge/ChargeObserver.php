<?php

namespace App\Observers\Business\Resource\Store\Charge;

use App\Models\Business\Resource\Store\Charge\Charge;

class ChargeObserver
{
    /**
     * @param Charge $charge
     */
    public function creating( Charge $charge )
    {
        $charge -> resource_id = uniqid();
    }
}
