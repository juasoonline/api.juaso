<?php

namespace App\Http\Resources\Business\Resource\Product\Review;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;

use App\Http\Resources\Juasoonline\Resource\Customer\Customer\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @method relationLoaded(string $string)
 */
class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray( $request ): array
    {
        return
        [
            'type'                  => 'Review',

            'attributes' =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'rating'            => $this -> resource -> rating,
                'review'            => $this -> resource -> review,
                'reviewer'          => $this -> resource -> customer -> first_name . " " .$this -> resource -> customer -> last_name,
                'status'            => $this -> resource -> status,

                'created_at'        => $this -> resource -> created_at -> toFormattedDateString(),
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'product' ) || $this -> relationLoaded( 'customer' ),
            [
                'product'           => new ProductResource( $this -> whenLoaded( 'product' ) ),
                'customer'          => new CustomerResource( $this -> whenLoaded( 'customer' ) ),
            ])
        ];
    }
}
