<?php

namespace App\Repositories\Juasoonline\Juaso\Country;

use App\Models\Juaso\Resource\Variant\Brand\Brand;
use App\Models\Juaso\Resource\Country\Country;
use Symfony\Component\HttpFoundation\JsonResponse;

interface JuasoonlineCountryRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse;

    /**
     * @param Country $country
     * @return JsonResponse
     */
    public function show( Country $country ) : JsonResponse;
}
