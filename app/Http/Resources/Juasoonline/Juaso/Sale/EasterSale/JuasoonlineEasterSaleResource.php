<?php

namespace App\Http\Resources\Juasoonline\Juaso\Sale\EasterSale;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineEasterSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray( $request )
    {
        return
        [
            'type'                          => 'EasterSale',

            'product'                       =>
            [
                'name'                      => $this -> resource -> product -> name,
                'image'                     => $this -> resource -> product -> mainImage[0]['image'],
                'pricing'                   => getPricing( $this -> resource -> product -> resource_id ),
                'rating'                    => getRating( $this -> resource -> product -> review -> where( 'rating', 5 ) -> count(), $this -> resource -> product -> review -> where( 'rating', 4 ) -> count(), $this -> resource -> product -> review -> where( 'rating', 3 ) -> count(), $this -> resource -> product -> review -> where( 'rating', 2 ) -> count(), $this -> resource -> product -> review -> where( 'rating', 1 ) -> count() ),
            ]
        ];
    }
}
