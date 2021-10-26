<?php

namespace App\Http\Resources\Juaso\Resource\Group\Subcategory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray( $request )
    {
        return
        [
            'type'                          => 'CategoryProduct',

            'attributes'                    =>
            [
                'resource_id'               => $this -> resource -> products[0] -> resource_id,
                'name'                      => $this -> resource -> products[0] -> name,
                'image'                     => $this -> resource -> products[0] -> mainImage[0]['image'],
                'pricing'                   => $this -> resource -> products[0] -> pricing,

                'free_delivery'             => $this -> resource -> products[0] -> free_delivery,

                'buyer_protection'          => $this -> resource -> products[0] -> buyer_protection,
                'quantity'                  => $this -> resource -> products[0] -> quantity,
                'total_sold'                => $this -> resource -> products[0] -> total_sold,

                'average_rating'            => calculateAverage( $this -> resource -> products[0] -> review -> where( 'rating', 5 ) -> count(), $this -> resource -> products[0] -> review -> where( 'rating', 4 ) -> count(), $this -> resource -> products[0] -> review -> where( 'rating', 3 ) -> count(), $this -> resource -> products[0] -> review -> where( 'rating', 2 ) -> count(), $this -> resource -> products[0] -> review -> where( 'rating', 1 ) -> count() ),
            ],

            'store'                         =>
            [
                'resource_id'               => $this -> resource -> products[0] -> store -> resource_id,
                'name'                      => $this -> resource -> products[0] -> store -> name,
            ],

            'pricing'                       => getPricing( $this -> resource -> products[0] -> resource_id ),
        ];

//        return ProductResource::collection( $this -> resource -> products[0] );
    }
}
