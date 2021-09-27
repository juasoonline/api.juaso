<?php

namespace App\Http\Resources\Business\Resource\Product\Faq;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded(string $string)
 */
class FaqResource extends JsonResource
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
            'type'                  => 'Faq',

            'attributes' =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'question'          => $this -> resource -> question,
                'answer'            => $this -> resource -> answer,
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'product' ),
            [
                'product'           => new ProductResource( $this -> whenLoaded( 'product' ) ),
            ])
        ];
    }
}
