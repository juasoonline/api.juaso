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
            'type'                          => 'Product',

            'attributes'                    =>
            [
                'resource_id'               => $this -> resource -> resource_id,
                'name'                      => $this -> resource -> name,
                'image'                     => $this -> resource -> mainImage[0]['image'],
                'pricing'                   => $this -> resource -> pricing,

                'free_delivery'             => $this -> resource -> free_delivery,

                'buyer_protection'          => $this -> resource -> buyer_protection,
                'quantity'                  => $this -> resource -> quantity,
                'total_sold'                => $this -> resource -> total_sold,

                'average_rating'            => calculateAverage( $this -> resource -> review -> where( 'rating', 5 ) -> count(), $this -> resource -> review -> where( 'rating', 4 ) -> count(), $this -> resource -> review -> where( 'rating', 3 ) -> count(), $this -> resource -> review -> where( 'rating', 2 ) -> count(), $this -> resource -> review -> where( 'rating', 1 ) -> count() ),
            ],

            'store'                         =>
            [
                'resource_id'               => $this -> resource -> store -> resource_id,
                'name'                      => $this -> resource -> store -> name,
            ],

            'brand'                         =>
            [
                'resource_id'               => $this -> resource -> brand -> resource_id,
                'name'                      => $this -> resource -> brand -> name,
                'logo'                      => $this -> resource -> brand -> logo,
            ],

            'pricing'                       => getPricing( $this -> resource -> resource_id ),
        ];
    }
}
