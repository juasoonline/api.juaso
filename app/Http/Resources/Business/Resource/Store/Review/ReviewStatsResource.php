<?php

namespace App\Http\Resources\Business\Resource\Store\Review;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewStatsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray( $request ) : array
    {
        return
        [
            'type'                          => 'StoreReviewStats',

            'attributes'                    => $this -> resource,
        ];
    }
}
