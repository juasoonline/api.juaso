<?php

namespace App\Http\Resources\Juasoonline\Business\Campaign\Slider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineSliderResource extends JsonResource
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
            'type'                  => 'CampaignSlider',

            'attributes'            =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'start'             => $this -> resource -> start,
                'end'               => $this -> resource -> end,

                'slider_image'      => $this -> resource -> slider_image,
            ],

            'store'                 => $this -> when( $this -> resource -> type === 'Store',
            [
                'store_id'          => $this -> resource -> store
            ]),

            'product'               => $this -> when( $this -> resource -> type === 'Product',
            [
                'product_id'        => $this -> resource -> product
            ]),
        ];
    }
}
