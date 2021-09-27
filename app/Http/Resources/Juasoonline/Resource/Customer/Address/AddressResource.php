<?php

namespace App\Http\Resources\Juasoonline\Resource\Customer\Address;

use App\Http\Resources\Juasoonline\Resource\Customer\Customer\CustomerResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|mixed
     */
    public function toArray( $request ) : array
    {
        return
        [
            'type'                  => 'Address',

            'attributes' =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'type'              => $this -> resource -> type,
                'country'           => $this -> resource -> country,
                'region'            => $this -> resource -> region,
                'city'              => $this -> resource -> city,
                'street_name'       => $this -> resource -> street_name,
                'postal_code'       => $this -> resource -> postal_code,
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'customer' ),
            [
                'customer'          => new CustomerResource( $this -> whenLoaded( 'customer' ) ),
            ])
        ];
    }
}
