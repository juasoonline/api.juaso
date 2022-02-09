<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Subcategory;

use App\Http\Resources\Juaso\Resource\Brand\BrandProductResource;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\CategoryProductResource;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\SubcategoryResource;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Juaso\Resource\Variant\Brand\Brand;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Models\Juaso\Resource\Group\Subcategory\SubcategoryProduct;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;
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
        $data = SubcategoryProduct::where( 'subcategory_id', $subcategory -> id ) -> pluck( 'product_id' );
        $products = Product::whereIn( 'id', $data ) -> where( 'status', '=', '000' ) -> orderBy( 'id', 'desc' ) -> distinct() -> paginate( 20 );
        return CategoryProductResource::collection( $products );
    }

    /**
     * @param Subcategory $subcategory
     * @return JsonResponse
     */
    public function brands( Subcategory $subcategory ) : JsonResponse
    {
        $data = SubcategoryProduct::where( 'subcategory_id', $subcategory -> id ) -> pluck( 'product_id' );
        $brands = DB::table( 'brands' ) -> join( 'products', 'brands.id', '=', 'products.brand_id' ) -> whereIn( 'products.id', $data ) -> limit( 100 ) -> get(['brands.logo', 'brands.name', 'brands.resource_id', 'brands.slug']) -> unique();
        $newData = Brand::hydrate( $brands -> toArray() );

        return $this -> successResponse( BrandProductResource::collection( $newData ), "Success", null, Response::HTTP_OK );
    }
}
