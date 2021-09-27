<?php

namespace App\Http\Resources\Business\Resource\Store\Review;

use App\Http\Resources\Business\Resource\Store\Store\StoreResource;
use App\Http\Resources\Juasoonline\Resource\Customer\Customer\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray( $request ): array
    {
        return
        [
            'id'                        => $this -> resource -> id,
            'type'                      => 'Review',

            'attributes' =>
            [
                'resource_id'           => $this -> resource -> resource_id,

                'reviewer'              => $this -> resource -> customer -> first_name . " " .$this -> resource -> customer -> last_name,

                'product_description'   => $this -> resource -> product_description,
                'communication'         => $this -> resource -> communication,
                'comment'               => $this -> resource -> comment,
                'status'                => $this -> resource -> status,

                'created_at'            => $this -> resource -> created_at -> toDateTimeString(),
                'updated_at'            => $this -> resource -> updated_at -> toDateTimeString(),
            ],

            'include'                   => $this -> when( $request -> is( 'juasoonline/*' ), $this -> when( $this -> relationLoaded( 'store' ) || $this -> relationLoaded( 'customer' ),
            [
                'store'                 => new StoreResource( $this -> whenLoaded( 'store' ) ),
                'customer'              => $this -> when( $request -> is( 'juasoonline/*' ), new CustomerResource( $this -> whenLoaded( 'customer' ))),
            ]))
        ];
    }
}
