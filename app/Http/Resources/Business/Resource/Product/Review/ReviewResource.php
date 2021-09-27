<?php

namespace App\Http\Resources\Business\Resource\Product\Review;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;

use App\Http\Resources\Juasoonline\Resource\Customer\Customer\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
                'customer_id'       => $this -> resource -> customer_id,
                'status'            => $this -> resource -> status,

                'created_at'        => $this -> resource -> created_at -> toDateTimeString(),
                'updated_at'        => $this -> resource -> updated_at -> toDateTimeString(),
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'product' ) || $this -> relationLoaded( 'customer' ),
            [
                'product'           => new ProductResource( $this -> whenLoaded( 'product' ) ),
                'customer'          => new CustomerResource( $this -> whenLoaded( 'customer' ) ),
            ])
        ];
    }
}
