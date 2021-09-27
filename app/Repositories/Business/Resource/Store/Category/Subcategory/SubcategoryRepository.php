<?php

namespace App\Repositories\Business\Resource\Store\Category\Subcategory;

use App\Http\Requests\Business\Resource\Store\Category\Subcategory\SubcategoryRequest;
use App\Http\Resources\Business\Resource\Store\Category\Subcategory\SubcategoryResource;
use App\Jobs\Business\Resource\Store\Category\Subcategory\CreateSubcategory;
use App\Jobs\Business\Resource\Store\Category\Subcategory\UpdateSubcategory;
use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class SubcategoryRepository implements SubcategoryRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function index( Category $storeCategory ) : JsonResponse
    {
        $Subcategory = Subcategory::query() -> when( $this -> loadRelationships(), function (Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( SubcategoryResource::collection( $Subcategory ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Category $storeCategory
     * @param SubcategoryRequest $storeSubcategoryRequest
     * @return JsonResponse
     */
    public function store( Category $storeCategory, SubcategoryRequest $storeSubcategoryRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateSubcategory( $storeCategory, $storeSubcategoryRequest ) ) -> handle(), "Success", "Subcategory created", Response::HTTP_CREATED );
    }

    /**
     * @param Category $storeCategory
     * @param Subcategory $storeSubcategory
     * @return JsonResponse
     */
    public function show( Category $storeCategory, Subcategory $storeSubcategory ) : JsonResponse
    {
        checkResourceRelation( $storeCategory -> subcategories() -> where( 'store_subcategories.id', $storeSubcategory -> id ) -> count());
        if ( $this -> loadRelationships() ) { $storeSubcategory -> load( $this -> relationships ); }
        return $this -> successResponse( new SubcategoryResource( $storeSubcategory ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Category $storeCategory
     * @param SubcategoryRequest $storeSubcategoryRequest
     * @param Subcategory $storeSubcategory
     * @return JsonResponse
     */
    public function update( Category $storeCategory, SubcategoryRequest $storeSubcategoryRequest, Subcategory $storeSubcategory ) : JsonResponse
    {
        checkResourceRelation( $storeCategory -> subcategories() -> where( 'store_subcategories.id', $storeSubcategory -> id ) -> count());
        return $this -> successResponse( ( new UpdateSubcategory( $storeSubcategoryRequest, $storeSubcategory ) ) -> handle(), 'Success', 'Subcategory updated', Response::HTTP_OK );
    }

    /**
     * @param Category $storeCategory
     * @param Subcategory $storeSubcategory
     * @return JsonResponse
     */
    public function destroy( Category $storeCategory, Subcategory $storeSubcategory ) : JsonResponse
    {
        checkResourceRelation( $storeCategory -> subcategories() -> where( 'store_subcategories.id', $storeSubcategory -> id ) -> count());
        try
        {
            $storeSubcategory -> delete();
            return $this -> successResponse( null, 'Success', 'Subcategory deleted.', Response::HTTP_NO_CONTENT );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
