<?php

namespace App\Repositories\Juasoonline\Business\Campaign\Slider;

use Illuminate\Http\JsonResponse;

interface JuasoonlineSliderRepositoryInterface
{
    /**
     * @return array|mixed
     */
    public function getSliders() : JsonResponse;
}
