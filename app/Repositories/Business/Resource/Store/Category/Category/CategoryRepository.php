<?php

namespace App\Repositories\Business\Resource\Store\Category\Category;

use App\Http\Requests\Business\Resource\Store\Category\Category\CategoryRequest;
use App\Http\Resources\Business\Resource\Store\Category\Category\CategoryResource;
use App\Jobs\Business\Resource\Store\Category\Category\CreateCategory;
use App\Jobs\Business\Resource\Store\Category\Category\UpdateCategory;
use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Store\Store\Store;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CategoryRepository implements CategoryRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse
    {
        $storeCategory = Category::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( CategoryResource::collection( $storeCategory ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param CategoryRequest $storeCategoryRequest
     * @return JsonResponse
     */
    public function store( Store $store, CategoryRequest $storeCategoryRequest) : JsonResponse
    {
        return $this -> successResponse( ( new CreateCategory( $store, $storeCategoryRequest ) ) -> handle(), "Success", "Category created", Response::HTTP_CREATED );
    }

    /**
     * @param Store $store
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function show( Store $store, Category $storeCategory ) : JsonResponse
    {
//        checkResourceRelation( $store -> categories() -> where( 'stores_categories.id', $storeCategory -> id ) -> count());
        if ( $this -> loadRelationships() ) { $storeCategory -> load( $this -> relationships ); }
        return $this -> successResponse( new CategoryResource( $storeCategory ), "Success", null, Response::HTTP_OK );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @param CategoryRequest $storeCategoryRequest
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function update( Store $store, CategoryRequest $storeCategoryRequest, Category $storeCategory ) : JsonResponse
    {
//        checkResourceRelation( $store -> categories() -> where( 'store_categories.id', $storeCategory -> id ) -> count());
        return $this -> successResponse( ( new UpdateCategory( $storeCategoryRequest, $storeCategory ) ) -> handle(), 'Success', 'Category updated', Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param Category $storeCategory
     * @return JsonResponse|mixed
     */
    public function destroy( Store $store, Category $storeCategory ) : JsonResponse
    {
        checkResourceRelation( $store -> categories() -> where( 'store_categories.id', $storeCategory -> id ) -> count());
        try
        {
            $storeCategory -> delete();
            return $this -> successResponse( null, 'Success', 'Category deleted.', Response::HTTP_NO_CONTENT );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
