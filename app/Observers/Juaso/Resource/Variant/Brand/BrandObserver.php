<?php

namespace App\Observers\Juaso\Resource\Variant\Brand;

use App\Models\Juaso\Resource\Variant\Brand\Brand;
use Illuminate\Support\Str;

class BrandObserver
{
    /**
     * @param Brand $brand
     */
    public function creating( Brand $brand )
    {
        $brand -> resource_id = uniqid();
        $brand -> slug = Str::slug( $brand -> name );
    }
}
