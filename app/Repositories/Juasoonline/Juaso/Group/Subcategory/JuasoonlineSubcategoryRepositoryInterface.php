<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Subcategory;

use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;

use Illuminate\Http\JsonResponse;

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
     * @return JsonResponse
     */
    public function products( Subcategory $subcategory ) : JsonResponse;
}
