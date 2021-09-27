<?php

namespace App\Observers\Juaso\Resource\Group\Category;

use App\Models\Juaso\Resource\Group\Category\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * @param Category $category
     */
    public function creating( Category $category )
    {
        $category -> resource_id = uniqid();
        $category -> slug = Str::slug( $category -> name );
    }
}
