<?php

namespace App\Repositories\Juasoonline\Business\Product;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use App\Models\Business\Resource\Product\Bundle\Bundle;
use App\Models\Business\Resource\Product\Color\Color;
use App\Models\Business\Resource\Product\Product\Product;

use App\Models\Business\Resource\Product\Size\Size;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineProductsRepository implements JuasoonlineProductsRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection
    {
        $Product = Product::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); }) -> orderBy( 'id', 'desc' ) -> where( 'status', '=', '000' ) -> paginate('10');
        return ProductResource::collection( $Product );
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function show( Product $product ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $product -> load( $this -> relationships ); }
        return $this -> successResponse( new ProductResource( $product ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function getRecommendations( Product $product ) : JsonResponse
    {
        $product = Product::query();
        if ( request('name')) { $product -> where('name', 'Like', '%' . request('name' ) . '%'); }
        return $this -> successResponse( ProductResource::collection( $product -> orderBy('id', 'DESC' ) -> where( 'status', '=', '000' ) -> paginate(500) ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @return JsonResponse
     */
    public function getTopRankings() : JsonResponse
    {
        $products = Product::orderBy( 'total_sold', 'DESC' ) -> paginate( 20 );
        return $this -> successResponse( ProductResource::collection( $products ), "Success", null, Response::HTTP_OK );
    }
}
