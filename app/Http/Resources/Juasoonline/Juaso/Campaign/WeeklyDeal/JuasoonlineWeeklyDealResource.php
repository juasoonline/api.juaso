<?php

namespace App\Http\Resources\Juasoonline\Juaso\Campaign\WeeklyDeal;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineWeeklyDealResource extends JsonResource
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
            'type'                          => 'WeeklyDeal',

            'attributes'                    =>
            [
                'resource_id'               => $this -> resource -> resource_id,

                'promo_start'               => Carbon::parse( $this -> resource -> promo_start ) -> diffForHumans(),
                'promo_end'                 => Carbon::parse( $this -> resource -> promo_end ) -> diffForHumans(),
            ],

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
