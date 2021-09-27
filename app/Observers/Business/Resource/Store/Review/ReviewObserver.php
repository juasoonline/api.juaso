<?php

namespace App\Observers\Business\Resource\Store\Review;

use App\Models\Business\Resource\Store\Review\Review;

class ReviewObserver
{
    /**
     * @param Review $review
     */
    public function creating(Review $review )
    {
        $review -> resource_id = uniqid();
    }
}
