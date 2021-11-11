<?php

namespace App\Http\Resources\Juasoonline\Business\Store\Category\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded(string $string)
 */
class JuasoonlineStoreCategoryResource extends JsonResource
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
            'type'                  => 'Category',

            'attributes'            =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'name'              => $this -> resource -> name,
                'slug'              => $this -> resource -> slug,
                'description'       => $this -> resource -> description,
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'store' ) || $this -> relationLoaded( 'subcategories' ),
            [
                'subcategories'     => JuasoonlineStoreSubcategoryResource::collection( $this -> whenLoaded('subcategories')),
            ])
        ];
    }
}
