<?php

namespace App\Http\Resources\Juasoonline\Business\Store\Category\Category;

use App\Http\Resources\Business\Resource\Store\Category\Category\CategoryResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class JuasoonlineStoreSubcategoryResource extends JsonResource
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
            ]
        ];
    }
}
