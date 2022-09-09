<?php

namespace App\Http\Resources\Juasoonline\Juaso\Campaign\TopRanking;

use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineTopRankingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request )
    {
        return
        [
            'type'                          => 'TopRanking',

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
                'name'                      => $this -> resource -> store -> doing_business_as,
            ]
        ];
    }
}