<?php

namespace App\Observers\Business\Resource\Product\Size;

use App\Models\Business\Resource\Product\Size\Size;

class SizeObserver
{
    /**
     * @param Size $size
     */
    public function creating( Size $size )
    {
        $size -> resource_id = uniqid();
    }
}
