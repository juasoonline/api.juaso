<?php

namespace App\Http\Resources\Juaso\Resource\Group\Subcategory;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return AnonymousResourceCollection
     */
    public function toArray( $request )
    {
        return ProductResource::collection( $this -> resource -> products );
    }
}
