<?php

namespace App\Repositories\Juasoonline\Juaso\Campaign\FeaturedCategory;

use Illuminate\Http\JsonResponse;

interface JuasoonlineFeaturedCategoryRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function getFeaturedCategories() : JsonResponse;
}
