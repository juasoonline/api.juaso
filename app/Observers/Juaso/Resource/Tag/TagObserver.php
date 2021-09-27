<?php

namespace App\Observers\Juaso\Resource\Tag;

use App\Models\Juaso\Resource\Tag\Tag;

class TagObserver
{
    /**
     * @param Tag $tag
     */
    public function creating( Tag $tag )
    {
        $tag -> resource_id = uniqid();
    }
}
