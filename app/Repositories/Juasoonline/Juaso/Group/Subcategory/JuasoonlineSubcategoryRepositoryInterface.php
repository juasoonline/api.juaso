<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Subcategory;

use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface JuasoonlineSubcategoryRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse;

    /**
     * @param Subcategory $subcategory
     * @return JsonResponse
     */
    public function show( Subcategory $subcategory ) : JsonResponse;

    /**
     * @param Subcategory $subcategory
     * @return AnonymousResourceCollection
     */
    public function products( Subcategory $subcategory ) : AnonymousResourceCollection;
}
