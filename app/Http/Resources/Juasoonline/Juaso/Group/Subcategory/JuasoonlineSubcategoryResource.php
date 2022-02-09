<?php

namespace App\Http\Resources\Juasoonline\Juaso\Group\Subcategory;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 * @method relationLoaded(string $string)
 */
class JuasoonlineSubcategoryResource extends JsonResource
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
            'type'                  => 'Subcategory',

            'attributes'            =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'name'              => $this -> resource -> name,
                'slug'              => $this -> resource -> slug,
                'description'       => $this -> resource -> description,

                'image_icon'        => $this -> resource -> image_icon,
                'web_icon'          => $this -> resource -> web_icon,
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'category' ) || $this -> relationLoaded( 'products' ),
            [
                'products'          => ProductResource::collection( $this -> whenLoaded('products') ),
            ])
        ];
    }
}
