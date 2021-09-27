<?php

namespace App\Observers\Business\Resource\Product\Product;

use App\Models\Business\Resource\Product\Product\Product;

class ProductObserver
{
    /**
     * @param Product $product
     */
    public function creating( Product $product )
    {
        $product -> resource_id = generateProductID( 16 );
    }
}
