<?php

namespace App\Repositories\Juasoonline\Business\Store;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use App\Http\Resources\Business\Resource\Store\Store\StoreResource;
use App\Http\Resources\Juasoonline\Business\Store\Category\Category\JuasoonlineStoreCategoryResource;
use App\Http\Resources\Juasoonline\Business\Store\Slider\JuasoonlineStoreSliderResource;
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
    public function getStoreCategories( Store $store ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $store -> load( $this -> relationships ); }
        return $this -> successResponse( JuasoonlineStoreCategoryResource::collection( $store -> categories() -> get() ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStoreSliders( Store $store ) : JsonResponse
    {
        return $this -> successResponse( JuasoonlineStoreSliderResource::collection( $store -> sliders() -> get() ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStoreProducts( Store $store ) : JsonResponse
    {
        return $this -> successResponse( ProductResource::collection( $store -> products() -> where( 'Pricing', "Product" ) -> paginate() ), "Success", null, Response::HTTP_OK );
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
        $data = array( 'type' => 'StoreStats', 'attributes' => array(), 'stats' => array(), 'ratings' => array() );
        $rating = array
        (
            'product_description_rating'    => getRating( $store -> reviews -> where( 'product_description', 5 ) -> count(), $store -> reviews -> where( 'product_description', 4 ) -> count(), $store -> reviews -> where( 'product_description', 3 ) -> count(), $store -> reviews -> where( 'product_description', 2 ) -> count(), $store -> reviews -> where( 'product_description', 1 ) -> count() ),
            'communication_rating'          => getRating( $store -> reviews -> where( 'communication', 5 ) -> count(), $store -> reviews -> where( 'communication', 4 ) -> count(), $store -> reviews -> where( 'communication', 3 ) -> count(), $store -> reviews -> where( 'communication', 2 ) -> count(), $store -> reviews -> where( 'communication', 1 ) -> count() ),
            'overall_rating'                => getOverallPercentage( $store -> reviews -> where( 'overall', 5 ) -> count(), $store -> reviews -> where( 'overall', 4 ) -> count(), $store -> reviews -> where( 'overall', 3 ) -> count(), $store -> reviews -> where( 'overall', 2 ) -> count(), $store -> reviews -> where( 'overall', 1 ) -> count() )
        );

        array_push( $data['attributes'], array('store_name' => $store -> name, 'doing_business_as' => $store -> doing_business_as, 'resource_id' => $store -> resource_id ));
        array_push( $data['stats'], array('items' => Product::where( 'store_id', $store -> id ) -> count(), 'followers' => $store -> followers() -> count()));
        array_push( $data['ratings'], $rating );

        return $this -> successResponse( $data, "Success", null, Response::HTTP_OK );
    }
}
