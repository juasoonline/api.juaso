<?php

namespace App\Observers\Business\Resource\Store\Branch;

use App\Models\Business\Resource\Store\Branch\Branch;

class BranchObserver
{
    /**
     * @param Branch $branch
     */
    public function creating( Branch $branch )
    {
        $branch -> resource_id = uniqid();
    }
}
