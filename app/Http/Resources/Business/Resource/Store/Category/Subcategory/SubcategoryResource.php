<?php

namespace App\Http\Resources\Business\Resource\Store\Category\Subcategory;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use App\Http\Resources\Business\Resource\Store\Category\Category\CategoryResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class SubcategoryResource extends JsonResource
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
            'type'                  => 'Subcategory',

            'attributes'            =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'name'              => $this -> resource -> name,
                'slug'              => $this -> resource -> slug,
                'description'       => $this -> resource -> description,

                'created_at'        => $this -> resource -> created_at -> toDateTimeString(),
                'updated_at'        => $this -> resource -> updated_at -> toDateTimeString(),
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'products' ) || $this -> relationLoaded( 'category' ),
            [
                'products'          => ProductResource::collection( $this -> whenLoaded('products') ),
                'category'          => new CategoryResource( $this -> whenLoaded('category')),
            ])
        ];
    }
}
