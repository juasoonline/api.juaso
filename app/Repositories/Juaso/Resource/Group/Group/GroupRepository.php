<?php

namespace App\Repositories\Juaso\Resource\Group\Group;

use App\Http\Requests\Juaso\Resource\Group\Group\GroupRequest;
use App\Http\Resources\Juaso\Resource\Group\Group\GroupProductResource;
use App\Http\Resources\Juaso\Resource\Group\Group\GroupResource;
use App\Jobs\Juaso\Resource\Group\Group\CreateGroup;
use App\Jobs\Juaso\Resource\Group\Group\UpdateGroup;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Juaso\Resource\Group\Group\Group;

use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Models\Juaso\Resource\Group\Subcategory\SubcategoryProduct;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class GroupRepository implements GroupRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse|mixed
     */
    public function index() : JsonResponse
    {
        $Group = Group::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( GroupResource::collection( $Group ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param GroupRequest $groupRequest
     * @return JsonResponse|mixed
     */
    public function store( GroupRequest $groupRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateGroup( $groupRequest ) ) -> handle(), "Success", "Group created", Response::HTTP_CREATED );
    }

    /**
     * @param Group $group
     * @return JsonResponse|mixed
     */
    public function show( Group $group ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $group -> load( $this -> relationships ); }
        return $this -> successResponse( new GroupResource( $group ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param GroupRequest $groupRequest
     * @param Group $group
     * @return JsonResponse|mixed
     */
    public function update( GroupRequest $groupRequest, Group $group ) : JsonResponse
    {
        return $this -> successResponse( ( new UpdateGroup( $groupRequest, $group ) ) -> handle(), 'Success', 'Group updated', Response::HTTP_OK );
    }

    /**
     * @param Group $group
     * @return JsonResponse|mixed
     * @throws \Exception
     */
    public function destroy( Group $group ) : JsonResponse
    {
        try
        {
            $group -> delete();
            return $this -> successResponse( null, 'Success', 'Group deleted', Response::HTTP_NO_CONTENT );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }

    /**
     * @param Group $group
     * @return JsonResponse|mixed
     * @throws \Exception
     */
    public function products( Group $group ) : JsonResponse
    {
//        $data = Group::find( $group -> id ) -> with( 'categories.subcategories.products' ) -> get();
//        return $this -> successResponse( new CategoryProductResource( $data ), "Success", null, Response::HTTP_OK );

//        $data = Group::find( $group -> id ) -> products() -> with( 'products' ) -> get();
//        return $this -> successResponse( $data, "Success", null, Response::HTTP_OK );

//        $data = Group::find( $group -> id ) -> products() -> get() -> pluck(['id']);
//        $products = DB::table( 'product_subcategory' ) -> whereIn( 'subcategory_id', $data ) -> distinct() -> get(['product_id']);


//        $products = DB::table( 'product_subcategory' ) -> whereIn( 'subcategory_id', $data ) -> join( 'products', 'product_subcategory.product_id', '=', 'products.id' ) -> groupBy( 'product_id' ) -> get();

//        return $this -> successResponse( $res, "Success", null, Response::HTTP_OK );
//        $data = Group::find( $group -> id ) -> products() -> get() -> pluck(['id']);



        $data = Group::find( $group -> id ) -> products() -> get() -> pluck(['id']);
        $res = SubcategoryProduct::find( $data ) -> categories() -> get();

        logger( $res );

        return $this -> successResponse( $res, "Success", null, Response::HTTP_OK );

        return $this -> successResponse( GroupProductResource::collection( $res ), "Success", null, Response::HTTP_OK );
    }
}
