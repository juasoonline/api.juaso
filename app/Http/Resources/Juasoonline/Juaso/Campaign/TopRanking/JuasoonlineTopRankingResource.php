<?php

namespace App\Http\Resources\Juasoonline\Juaso\Campaign\TopRanking;

use Illuminate\Http\Resources\Json\JsonResource;

class JuasoonlineTopRankingResource extends JsonResource
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
