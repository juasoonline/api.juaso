<?php

namespace App\Observers\Business\Resource\Product\Color;

use App\Models\Business\Resource\Product\Color\Color;

class ColorObserver
{
    /**
     * @param Color $color
     */
    public function creating( Color $color )
    {
        $color -> resource_id = uniqid();
    }
}
