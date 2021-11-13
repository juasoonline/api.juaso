<?php

namespace App\Http\Resources\Juasoonline\Juaso\Group\Group;

use App\Http\Resources\Juasoonline\Juaso\Group\Category\JuasoonlineCategoryResource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 * @method relationLoaded(string $string)
 */
class JuasoonlineGroupResource extends JsonResource
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
            'type'                  => 'Group',

            'attributes'            =>
            [
                'resource_id'       => $this -> resource -> resource_id,

                'name'              => $this -> resource -> name,
                'slug'              => $this -> resource -> slug,
                'description'       => $this -> resource -> description,

                'image_icon'        => $this -> resource -> image_icon,
                'web_icon'          => $this -> resource -> web_icon,
            ],

            'include'               => $this -> when( $this -> relationLoaded( 'categories' ),
            [
                'categories'        => JuasoonlineCategoryResource::collection( $this -> whenLoaded('categories') ),
            ])
        ];
    }
}
