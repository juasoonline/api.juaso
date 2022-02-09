<?php

namespace App\Http\Resources\Juasoonline\Juaso\Sale\BlackFriday;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineBlackFridayCategoryResource extends JsonResource
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
            'type'                          => 'BlackFriday',

            'attributes'                    =>
            [
                'resource_id'               => $this -> resource -> resource_id,
                'name'                      => $this -> resource -> name,
                'slug'                      => $this -> resource -> slug,
            ],
            'product'                       => new JuasoonlineBlackFridayResource( $this -> resource -> black_fridays[0]),
        ];
    }
}
