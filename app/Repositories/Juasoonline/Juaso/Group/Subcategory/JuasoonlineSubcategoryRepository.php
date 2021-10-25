<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Subcategory;


use App\Http\Resources\Juaso\Resource\Group\Subcategory\CategoryProductResource;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\SubcategoryResource;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;

use App\Models\Juaso\Resource\Group\Subcategory\SubcategoryProduct;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineSubcategoryRepository implements JuasoonlineSubcategoryRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $Subcategory = Subcategory::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( SubcategoryResource::collection( $Subcategory ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Subcategory $subcategory
     * @return JsonResponse
     */
    public function show( Subcategory $subcategory ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $subcategory -> load( $this -> relationships ); }
        return $this -> successResponse( new SubcategoryResource( $subcategory ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Subcategory $subcategory
     * @return AnonymousResourceCollection
     */
    public function products( Subcategory $subcategory ) : AnonymousResourceCollection
    {
        $data = SubcategoryProduct::where( 'subcategory_id', $subcategory -> id ) -> with( 'products' ) -> distinct() -> paginate();
        return CategoryProductResource::collection( $data );



//        return $this -> successResponse( CategoryProductResource::collection( $data ), "Success", null, Response::HTTP_OK );
    }
}
