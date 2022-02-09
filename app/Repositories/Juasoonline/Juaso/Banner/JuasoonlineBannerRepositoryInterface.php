<?php

namespace App\Repositories\Juasoonline\Juaso\Banner;

use Illuminate\Http\JsonResponse;

interface JuasoonlineBannerRepositoryInterface
{
    /**
     * @return array|mixed
     */
    public function getBanners() : JsonResponse;
}
