<?php

namespace App\Http\Resources\Business\Resource\Campaign\WeeklyDeal;

use Illuminate\Http\Resources\Json\JsonResource;

class WeeklyDealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
