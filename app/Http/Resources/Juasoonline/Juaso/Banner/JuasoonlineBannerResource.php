<?php

namespace App\Http\Resources\Juasoonline\Juaso\Banner;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineBannerResource extends JsonResource
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
            'type'                  => 'Banner',

            'attributes'            =>
            [
                'resource_id'       => $this -> resource -> resource_id,
                'type'              => $this -> resource -> type,
                'image'             => $this -> resource -> image,
            ]
        ];
    }
}
