<?php

namespace App\Http\Resources\Juasoonline\Resource\Promotion;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
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
            'id'                            => $this -> resource -> id,
            'type'                          => 'Promotion',

            'attributes' =>
            [
                'resource_id'               => $this -> resource -> resource_id,

                'promo_start'               => Carbon::parse( $this -> resource -> promo_start ) -> diffForHumans(),
                'promo_end'                 => Carbon::parse( $this -> resource -> promo_end ) -> diffForHumans(),

                'created_at'                => $this -> resource -> created_at -> toDateTimeString(),
                'updated_at'                => $this -> resource -> updated_at -> toDateTimeString(),
            ],

            'product'                       => new ProductResource( $this -> resource -> product ),
        ];
    }
}
