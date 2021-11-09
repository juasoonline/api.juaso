<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Category;

use App\Models\Juaso\Resource\Group\Category\Category;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\JsonResponse;

interface JuasoonlineCategoryRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse;

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function show( Category $category ) : JsonResponse;

    /**
     * @param Category $category
     * @return AnonymousResourceCollection
     */
    public function products( Category $category ) : AnonymousResourceCollection;
}
