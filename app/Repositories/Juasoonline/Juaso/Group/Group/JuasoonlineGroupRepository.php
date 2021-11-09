<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Group;

use App\Http\Resources\Juaso\Resource\Group\Group\GroupResource;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\CategoryProductResource;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Juaso\Resource\Group\Category\Category;
use App\Models\Juaso\Resource\Group\Group\Group;

use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Models\Juaso\Resource\Group\Subcategory\SubcategoryProduct;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineGroupRepository implements JuasoonlineGroupRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $Group = Group::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( GroupResource::collection( $Group ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Group $group
     * @return JsonResponse
     */
    public function show( Group $group ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $group -> load( $this -> relationships ); }
        return $this -> successResponse( new GroupResource( $group ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Group $group
     * @return AnonymousResourceCollection
     */
    public function products( Group $group ) : AnonymousResourceCollection
    {
        $categories = Category::where( 'group_id', $group -> id ) -> pluck( 'id' );
        $subcategories = Subcategory::whereIn( 'category_id', $categories ) -> pluck( 'id' );
        $data = SubcategoryProduct::whereIn( 'subcategory_id', $subcategories ) -> pluck( 'product_id' );

        $products = Product::whereIn( 'id', $data ) -> where( 'status', '=', '000' ) -> orderBy( 'id', 'desc' ) -> distinct() -> paginate( 20 );
        return CategoryProductResource::collection( $products );
    }
}
