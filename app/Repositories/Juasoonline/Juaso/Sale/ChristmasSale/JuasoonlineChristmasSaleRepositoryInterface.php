<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\ChristmasSale;

use Illuminate\Http\JsonResponse;

interface JuasoonlineChristmasSaleRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse;
}
