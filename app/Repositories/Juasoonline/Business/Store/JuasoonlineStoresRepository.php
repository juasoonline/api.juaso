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
        return $this -> successResponse( getStoreStats( $store ), "Success", null, Response::HTTP_OK );
    }
}
