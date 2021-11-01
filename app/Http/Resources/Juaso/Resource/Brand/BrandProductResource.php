<?php

namespace App\Http\Resources\Juaso\Resource\Brand;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
            'type'                  => 'Brand',

            'attributes'            =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'name'              => $this -> resource -> name,
                'slug'              => $this -> resource -> slug,
                'description'       => $this -> resource -> description,
                'logo'              => $this -> resource -> logo,
            ]
        ];
    }
}
