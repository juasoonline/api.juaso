<?php

namespace App\Http\Controllers\Business\Resource\Store\Category\Category;

use App\Repositories\Business\Resource\Store\Category\Category\CategoryRepositoryInterface;
use App\Http\Requests\Business\Resource\Store\Category\Category\CategoryRequest;
use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Store\Store\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    private $theRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $storeCategoryRepository
     */
    public function __construct( CategoryRepositoryInterface $storeCategoryRepository )
    {
        $this -> theRepository = $storeCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> index( $store );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $store
     * @param CategoryRequest $storeCategoryRequest
     * @return JsonResponse
     */
    public function store(Store $store, CategoryRequest $storeCategoryRequest ) : JsonResponse
    {
        return $this -> theRepository -> store( $store, $storeCategoryRequest );
    }

    /**
     * Display the specified resource.
     *
     * @param Store $store
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function show(Store $store, Category $storeCategory ) : JsonResponse
    {
        return $this -> theRepository -> show( $store, $storeCategory );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @param CategoryRequest $storeCategoryRequest
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function update(Store $store, CategoryRequest $storeCategoryRequest, Category $storeCategory ) : JsonResponse
    {
        return $this -> theRepository -> update( $store, $storeCategoryRequest, $storeCategory );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Store $store
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function destroy(Store $store, Category $storeCategory ) : JsonResponse
    {
        return $this -> theRepository -> destroy( $store, $storeCategory );
    }
}
