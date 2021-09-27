<?php

namespace App\Observers\Business\Resource\Product\Overview;

use App\Models\Business\Resource\Product\Overview\Overview;

class OverviewObserver
{
    /**
     * @param Overview $overview
     */
    public function creating( Overview $overview )
    {
        $overview -> resource_id = uniqid();
    }
}
