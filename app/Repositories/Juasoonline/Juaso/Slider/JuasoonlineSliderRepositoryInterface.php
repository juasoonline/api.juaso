<?php

namespace App\Repositories\Juasoonline\Juaso\Slider;

use Illuminate\Http\JsonResponse;

interface JuasoonlineSliderRepositoryInterface
{
    /**
     * @return array|mixed
     */
    public function getSliders() : JsonResponse;
}
