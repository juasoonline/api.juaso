<?php

namespace App\Http\Resources\Juasoonline\Business\Store\Slider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class JuasoonlineStoreSliderResource extends JsonResource
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
            'type'                  => 'Image',

            'attributes'            =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'description'       => $this -> resource -> description,
                'image'             => $this -> resource -> image,

                'product_id'        => $this -> resource -> product -> resource_id,
                'store_id'          => $this -> resource -> store -> resource_id,
            ]
        ];
    }
}
