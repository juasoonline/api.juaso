<?php

namespace App\Http\Resources\Business\Resource\Store\Coupon;

use App\Http\Resources\Business\Resource\Store\Store\StoreResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded(string $string)
 */
class CouponResource extends JsonResource
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
            'type'                      => 'Coupon',

            'attributes' =>
            [
                'resource_id'           => $this -> resource -> resource_id,

                'value'                 => $this -> resource -> value,
                'expiration_date'               => $this -> resource -> expiration_date,
                'status'                => $this -> resource -> status,

                'created_at'            => $this -> resource -> created_at -> toDateTimeString(),
                'updated_at'            => $this -> resource -> updated_at -> toDateTimeString(),
            ],

            'include'                   => $this -> when( $this -> relationLoaded( 'store' ),
            [
                'store'                 => new StoreResource( $this -> whenLoaded( 'store' ) ),
            ])
        ];
    }
}
