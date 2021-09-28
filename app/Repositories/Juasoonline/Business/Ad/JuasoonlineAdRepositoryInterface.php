<?php

namespace App\Repositories\Juasoonline\Business\Ad;

use Illuminate\Http\JsonResponse;

interface JuasoonlineAdRepositoryInterface
{

    /**
     * @return array|mixed
     */
    public function quickDeals() : JsonResponse;

    /**
     * @return array|mixed
     */
    public function sliderAds() : JsonResponse;
}
