<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\Sale;

use App\Models\Juaso\Resource\Sale\Sale\Sale;
use Illuminate\Http\JsonResponse;

interface JuasoonlineSaleRepositoryInterface
{
    /**
     * @param Sale $sale
     * @return JsonResponse
     */
    public function getSale( Sale $sale ) : JsonResponse;

    /**
     * @param Sale $sale
     * @return JsonResponse
     */
    public function getCategories( Sale $sale ) : JsonResponse;
}
