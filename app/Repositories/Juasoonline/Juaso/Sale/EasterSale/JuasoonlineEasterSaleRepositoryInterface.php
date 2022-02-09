<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\EasterSale;

use Illuminate\Http\JsonResponse;

interface JuasoonlineEasterSaleRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse;
}
