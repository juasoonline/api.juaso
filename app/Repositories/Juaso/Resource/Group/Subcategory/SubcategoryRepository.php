<?php

namespace App\Repositories\Juaso\Resource\Group\Subcategory;

use App\Http\Requests\Juaso\Resource\Group\Subcategory\SubcategoryRequest;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\CategoryProductResource;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\SubcategoryResource;
use App\Jobs\Juaso\Resource\Group\Subcategory\CreateSubcategory;
use App\Jobs\Juaso\Resource\Group\Subcategory\UpdateSubcategory;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;

use App\Models\Juaso\Resource\Group\Subcategory\SubcategoryProduct;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SubcategoryRepository implements SubcategoryRepositoryInterface
{
    use apiResponseBuilder; use Relatives;

    /**
     * @return JsonResponse|mixed
     */
    public function index() : JsonResponse
    {
        $Subcategory = Subcategory::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( SubcategoryResource::collection( $Subcategory ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param SubcategoryRequest $subcategoryRequest
     * @return JsonResponse|mixed
     */
    public function store( SubcategoryRequest $subcategoryRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateSubcategory( $subcategoryRequest ) ) -> handle(), "Success", "Subcategory created", Response::HTTP_CREATED );
    }

    /**
     * @param Subcategory $subcategory
     * @return JsonResponse|mixed
     */
    public function show( Subcategory $subcategory ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $subcategory -> load( $this -> relationships ); }
        return $this -> successResponse( new SubcategoryResource( $subcategory ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param SubcategoryRequest $subcategoryRequest
     * @param Subcategory $subcategory
     * @return JsonResponse|mixed
     */
    public function update( SubcategoryRequest $subcategoryRequest, Subcategory $subcategory ) : JsonResponse
    {
        return $this -> successResponse( ( new UpdateSubcategory( $subcategoryRequest, $subcategory ) ) -> handle(), 'Success', 'Subcategory updated', Response::HTTP_OK );
    }

    /**
     * @param Subcategory $subcategory
     * @return JsonResponse|mixed
     * @throws Exception
     */
    public function destroy( Subcategory $subcategory ) : JsonResponse
    {
        try
        {
            $subcategory -> delete();
            return $this -> successResponse( null, 'Success', 'Subcategory deleted', Response::HTTP_NO_CONTENT );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }

    /**
     * @param Subcategory $subcategory
     * @return JsonResponse|mixed
     */
    public function products( Subcategory $subcategory ) : JsonResponse
    {
        $data = SubcategoryProduct::where( 'subcategory_id', $subcategory -> id ) -> with( 'products' ) -> distinct() -> paginate();
        return $this -> successResponse( CategoryProductResource::collection( $data ), "Success", null, Response::HTTP_OK );
    }
}
