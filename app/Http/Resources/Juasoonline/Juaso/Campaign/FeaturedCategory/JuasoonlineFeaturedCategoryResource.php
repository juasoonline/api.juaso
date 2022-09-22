<?php

namespace App\Http\Resources\Juasoonline\Juaso\Campaign\FeaturedCategory;

use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineFeaturedCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request )
    {
        return
        [
            'type'                  => 'FeaturedCategory',

            'attributes'            =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'name'              => $this -> resource -> name,
                'slug'              => $this -> resource -> slug,
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'group' ) || $this -> relationLoaded( 'subcategories' ),
            [
                // 'subcategories'     => JuasoonlineSubcategoryResource::collection( $this -> whenLoaded('subcategories')),
            ])
        ];
    }
}
