<?php

namespace App\Http\Resources\Business\Resource\Campaign\FlashDeal;

use Illuminate\Http\Resources\Json\JsonResource;

class FlashDealResource extends JsonResource
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
