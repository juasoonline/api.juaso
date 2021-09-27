<?php

namespace App\Observers\Business\Resource\Store\Category\Category;

use App\Models\Business\Resource\Store\Category\Category\Category;

use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * @param Category $productCategory
     */
    public function creating( Category $productCategory )
    {
        $productCategory -> resource_id = uniqid();
        $productCategory -> slug = Str::slug( $productCategory -> name );
    }
}
