<?php

namespace App\Http\Resources\Juaso\Resource\Group\Category;

use App\Http\Resources\Juaso\Resource\Group\Group\GroupResource;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\SubcategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class CategoryResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array|mixed
     */
    public function toArray( $request ) : array
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

            'include'               => $this -> when( $this -> relationLoaded( 'group' ) || $this -> relationLoaded( 'subcategories' ),
            [
                'group'             => new GroupResource( $this -> whenLoaded( 'group' ) ),
                'subcategories'     => SubcategoryResource::collection( $this -> whenLoaded('subcategories')),
            ])
        ];
    }
}
