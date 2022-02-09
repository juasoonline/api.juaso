<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\BlackFriday;

use Illuminate\Http\JsonResponse;

interface JuasoonlineBlackFridayRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse;
    /**
     * @return JsonResponse
     */
    public function getProductCategories() : JsonResponse;
}
