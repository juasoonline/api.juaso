<?php

namespace App\Observers\Business\Resource\Store\Category\Subcategory;

use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory;

use Illuminate\Support\Str;

class SubcategoryObserver
{
    /**
     * @param Subcategory $productSubcategory
     */
    public function creating( Subcategory $productSubcategory )
    {
        $productSubcategory -> resource_id = uniqid();
        $productSubcategory -> slug = Str::slug( $productSubcategory -> name );
    }
}
