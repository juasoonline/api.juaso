<?php

namespace App\Http\Resources\Juaso\Resource\Sale\WeeklyDeal;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeeklyDealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray( $request )
    {
        return parent::toArray( $request );
    }
}
