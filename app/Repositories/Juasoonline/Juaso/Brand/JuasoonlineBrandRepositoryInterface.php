<?php

namespace App\Repositories\Juasoonline\Juaso\Brand;

use App\Models\Juaso\Resource\Brand\Brand;
use Symfony\Component\HttpFoundation\JsonResponse;

interface JuasoonlineBrandRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse;

    /**
     * @param Brand $brand
     * @return JsonResponse
     */
    public function show( Brand $brand ) : JsonResponse;
}
