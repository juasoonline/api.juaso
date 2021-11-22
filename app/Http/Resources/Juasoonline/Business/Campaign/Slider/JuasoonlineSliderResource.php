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
                'store_id'          => $this -> resource -> store_id,

                'start'             => $this -> resource -> start,
                'end'               => $this -> resource -> end,

                'name'              => $this -> resource -> name,
                'slug'              => $this -> resource -> slug,

                'slider_image'      => $this -> resource -> slider_image,
            ]
        ];
    }
}
