<?php

namespace App\Observers\Business\Resource\Product\Bundle;

use App\Models\Business\Resource\Product\Bundle\Bundle;

class BundleObserver
{
    /**
     * @param Bundle $bundle
     */
    public function creating( Bundle $bundle )
    {
        $bundle -> resource_id = uniqid();
    }
}
