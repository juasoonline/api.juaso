<?php

namespace App\Http\Resources\Juaso\Resource\Tag;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray( $request )
    {
        return parent::toArray($request);
    }
}
