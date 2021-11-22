<?php

namespace App\Http\Resources\Juasoonline\Business\Campaign\NewArrival;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineNewArrivalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray( $request )
    {
        return
        [
            'type'                          => 'NewArrival',

            'attributes'                    =>
            [
                'resource_id'               => $this -> resource -> resource_id,

                'name'                      => $this -> resource -> name,
                'image'                     => $this -> resource -> mainImage[0]['image'],
                'total_sold'                => $this -> resource -> total_sold,
            ],

            'pricing'                       => getPricing( $this -> resource -> resource_id ),
            'rating'                        => getRating( $this -> resource -> review -> where( 'rating', 5 ) -> count(), $this -> resource -> review -> where( 'rating', 4 ) -> count(), $this -> resource -> review -> where( 'rating', 3 ) -> count(), $this -> resource -> review -> where( 'rating', 2 ) -> count(), $this -> resource -> review -> where( 'rating', 1 ) -> count() ),

            'store'                         =>
            [
                'resource_id'               => $this -> resource -> store -> resource_id,
                'name'                      => $this -> resource -> store -> name,
            ]
        ];
    }
}
