<?php

namespace App\Observers\Juaso\Resource\Brand;

use App\Models\Juaso\Resource\Brand\Brand;
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
