<?php

namespace App\Http\Resources\Business\Resource\Product\Image;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class ImageResource extends JsonResource
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
            'type'                  => 'Image',

            'attributes' =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'description'       => $this -> resource -> description,
                'image'             => $this -> resource -> image,
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'product' ),
            [
                'product'           => new ProductResource( $this -> whenLoaded( 'product' ) ),
            ])
        ];
    }
}
