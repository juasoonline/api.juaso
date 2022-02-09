<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\AnniversarySale;

use Illuminate\Http\JsonResponse;

interface JuasoonlineAnniversarySaleRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse;
}
