<?php

namespace App\Http\Resources\Juasoonline\Resource\Promotion;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use App\Http\Resources\Juasoonline\Business\Product\Product\JuasoonlineProductResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlashDealsResource extends JsonResource
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
            'type'                          => 'Promotion',

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
            ]
        ];
    }
}
