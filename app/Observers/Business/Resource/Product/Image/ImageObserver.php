<?php

namespace App\Observers\Business\Resource\Product\Image;

use App\Models\Business\Resource\Product\Image\Image;

class ImageObserver
{
    /**
     * @param Image $productImage
     */
    public function creating( Image $productImage )
    {
        $productImage -> resource_id = uniqid();
    }
}
