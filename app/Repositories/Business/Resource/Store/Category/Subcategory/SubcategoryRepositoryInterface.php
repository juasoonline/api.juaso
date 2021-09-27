<?php

namespace App\Repositories\Business\Resource\Store\Category\Subcategory;

use App\Http\Requests\Business\Resource\Store\Category\Subcategory\SubcategoryRequest;
use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory;
use Illuminate\Http\JsonResponse;

interface SubcategoryRepositoryInterface
{
    /**
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function index( Category $storeCategory ) : JsonResponse;

    /**
     * @param Category $storeCategory
     * @param SubcategoryRequest $storeSubcategoryRequest
     * @return JsonResponse
     */
    public function store( Category $storeCategory, SubcategoryRequest $storeSubcategoryRequest ) : JsonResponse;

    /**
     * @param Category $storeCategory
     * @param Subcategory $storeSubcategory
     * @return JsonResponse
     */
    public function show( Category $storeCategory, Subcategory $storeSubcategory ) : JsonResponse;

    /**
     * @param Category $storeCategory
     * @param SubcategoryRequest $storeSubcategoryRequest
     * @param Subcategory $storeSubcategory
     * @return JsonResponse
     */
    public function update( Category $storeCategory, SubcategoryRequest $storeSubcategoryRequest, Subcategory $storeSubcategory ) : JsonResponse;

    /**
     * @param Category $storeCategory
     * @param Subcategory $storeSubcategory
     * @return JsonResponse
     */
    public function destroy( Category $storeCategory, Subcategory $storeSubcategory ) : JsonResponse;
}
