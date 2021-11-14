<?php

namespace App\Http\Resources\Juasoonline\Business\Product\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineProductNewArrivalResource extends JsonResource
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
            'type'                          => 'Product',

            'attributes' =>
            [
                'resource_id'               => $this -> resource -> resource_id,

                'name'                      => $this -> resource -> name,
                'slug'                      => $this -> resource -> slug,
                'description'               => $this -> resource -> description,

                'image'                     => $this -> resource -> mainImage[0]['image'],
                'average_rating'            => calculateAverage( $this -> resource -> review -> where( 'rating', 5 ) -> count(), $this -> resource -> review -> where( 'rating', 4 ) -> count(), $this -> resource -> review -> where( 'rating', 3 ) -> count(), $this -> resource -> review -> where( 'rating', 2 ) -> count(), $this -> resource -> review -> where( 'rating', 1 ) -> count() ),
            ],

            'store'                         =>
            [
                'resource_id'               => $this -> resource -> store -> resource_id,
                'name'                      => $this -> resource -> store -> doing_business_as,
            ],

            'pricing'                       =>
            [
                'prices'                    => getPricing( $this -> resource -> resource_id ),
            ],
        ];
    }
}
