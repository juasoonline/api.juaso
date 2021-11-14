<?php

namespace App\Repositories\Juasoonline\Business\Ad;

use Illuminate\Http\JsonResponse;

interface JuasoonlineAdRepositoryInterface
{
    /**
     * @return array|mixed
     */
    public function getSliders() : JsonResponse;

    /**
     * @return array|mixed
     */
    public function getFlashDeals() : JsonResponse;

    /**
     * @return array|mixed
     */
    public function getNewArrivals() : JsonResponse;
}
