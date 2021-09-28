<?php

namespace App\Repositories\Juasoonline\Business\Product;

use App\Models\Business\Resource\Product\Product\Product;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface JuasoonlineProductsRepositoryInterface
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection;

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function show( Product $product ) : JsonResponse;

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function getRecommendations( Product $product ) : JsonResponse;
}
