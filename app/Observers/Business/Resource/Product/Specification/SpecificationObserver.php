<?php

namespace App\Observers\Business\Resource\Product\Specification;

use App\Models\Business\Resource\Product\Specification\Specification;

class SpecificationObserver
{
    /**
     * @param Specification $specification
     */
    public function creating( Specification $specification )
    {
        $specification -> resource_id = uniqid();
    }
}
