<?php

namespace App\Observers\Business\Resource\Product\Review;

use App\Models\Business\Resource\Product\Review\Review;

class ReviewObserver
{
    /**
     * @param Review $review
     */
    public function creating( Review $review )
    {
        $review -> resource_id = uniqid();
    }
}
