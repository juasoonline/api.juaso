<?php

namespace App\Repositories\Juasoonline\Business\Store;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use App\Http\Resources\Business\Resource\Store\Store\StoreResource;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Product\Product\Product;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineStoresRepository implements JuasoonlineStoresRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStore( Store $store ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $store -> load( $this -> relationships ); }
        return $this -> successResponse( new StoreResource( $store ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStoreProducts( Store $store ) : JsonResponse
    {
        return $this -> successResponse( ProductResource::collection( $store -> products() -> paginate() ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param Product $product
     * @return AnonymousResourceCollection
     */
    public function getStoreRecommendations( Store $store, Product $product ) : AnonymousResourceCollection
    {
        $product = Product::query();
        if ( request('name')) { $product -> where('name', 'Like', '%' . request('name' ) . '%'); }
        return ProductResource::collection( $product -> orderBy('id', 'DESC' ) -> paginate(20 ));
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStoreTopSelling( Store $store ) : JsonResponse
    {
        $topSelling = Product::where( 'store_id', '=', $store -> id ) -> where( 'status', '=', 0 ) -> orderBy('total_sold', 'DESC' ) -> limit( 10 ) -> get();
        return $this -> successResponse( ProductResource::collection( $topSelling ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStoreStats( Store $store ) : JsonResponse
    {
        $data = array( 'type' => 'StoreStats', 'attributes' => array(), 'ratings' => array()  );
        $rating = array
        (
            'product_description_rating'    => getRating( $store -> reviews -> where( 'product_description', 5 ) -> count(), $store -> reviews -> where( 'product_description', 4 ) -> count(), $store -> reviews -> where( 'product_description', 3 ) -> count(), $store -> reviews -> where( 'product_description', 2 ) -> count(), $store -> reviews -> where( 'product_description', 1 ) -> count() ),
            'communication_rating'          => getRating( $store -> reviews -> where( 'communication', 5 ) -> count(), $store -> reviews -> where( 'communication', 4 ) -> count(), $store -> reviews -> where( 'communication', 3 ) -> count(), $store -> reviews -> where( 'communication', 2 ) -> count(), $store -> reviews -> where( 'communication', 1 ) -> count() )
        );

        array_push( $data['attributes'], array('resource_id' => $store -> resource_id, 'items' => Product::where( 'store_id', $store -> id ) -> count(), 'followers' => $store -> followers() -> count()));
        array_push( $data['ratings'], $rating);

        return $this -> successResponse( $data, "Success", null, Response::HTTP_OK );
    }
}
