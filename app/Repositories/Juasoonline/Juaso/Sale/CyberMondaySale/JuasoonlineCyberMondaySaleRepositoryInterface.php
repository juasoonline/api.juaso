<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\CyberMondaySale;

use Illuminate\Http\JsonResponse;

interface JuasoonlineCyberMondaySaleRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse;
}
