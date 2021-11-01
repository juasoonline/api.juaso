<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Category;


use App\Http\Resources\Juaso\Resource\Group\Category\CategoryResource;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\CategoryProductResource;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Juaso\Resource\Group\Category\Category;

use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Models\Juaso\Resource\Group\Subcategory\SubcategoryProduct;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineCategoryRepository implements JuasoonlineCategoryRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $Category = Category::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( CategoryResource::collection( $Category ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function show( Category $category ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $category -> load( $this -> relationships ); }
        return $this -> successResponse( new CategoryResource( $category ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Category $category
     * @return AnonymousResourceCollection
     */
    public function products( Category $category ) : AnonymousResourceCollection
    {
        $subCats = Subcategory::where( 'category_id', $category -> id ) -> pluck( 'id' );
        $data = SubcategoryProduct::whereIn( 'subcategory_id', $subCats ) -> pluck( 'product_id' );

        $products = Product::whereIn( 'id', $data ) -> where( 'status', '=', '000' ) -> orderBy( 'id', 'desc' ) -> distinct() -> paginate( 20 );
        return CategoryProductResource::collection( $products );
    }
}
