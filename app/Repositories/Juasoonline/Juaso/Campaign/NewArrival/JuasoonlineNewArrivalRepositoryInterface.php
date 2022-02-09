<?php

namespace App\Repositories\Juasoonline\Juaso\Campaign\NewArrival;

use Illuminate\Http\JsonResponse;

interface JuasoonlineNewArrivalRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function getNewArrivals() : JsonResponse;
}
