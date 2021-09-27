<?php

namespace App\Repositories\Business\Resource\Store\Category\Category;

use App\Http\Requests\Business\Resource\Store\Category\Category\CategoryRequest;
use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Store\Store\Store;

use Illuminate\Http\JsonResponse;

interface CategoryRepositoryInterface
{
    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse;

    /**
     * @param Store $store
     * @param CategoryRequest $storeCategoryRequest
     * @return JsonResponse
     */
    public function store( Store $store, CategoryRequest $storeCategoryRequest ) : JsonResponse;

    /**
     * @param Store $store
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function show( Store $store, Category $storeCategory ) : JsonResponse;

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @param CategoryRequest $storeCategoryRequest
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function update( Store $store, CategoryRequest $storeCategoryRequest, Category $storeCategory ) : JsonResponse;

    /**
     * @param Store $store
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function destroy( Store $store, Category $storeCategory ) : JsonResponse;
}
