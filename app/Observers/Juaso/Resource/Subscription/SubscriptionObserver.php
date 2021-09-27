<?php

namespace App\Observers\Juaso\Resource\Subscription;

use App\Models\Juaso\Resource\Subscription\Subscription;

class SubscriptionObserver
{
    /**
     * @param Subscription $subscription
     */
    public function creating( Subscription $subscription )
    {
        $subscription -> resource_id = uniqid();
    }
}
