<?php

namespace App\Http\Controllers\Juasoonline\Business\Store;

use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Product\Product\Product;
use App\Repositories\Juasoonline\Business\Store\JuasoonlineStoresRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class JuasoonlineStoreController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineStoreController constructor.
     * @param JuasoonlineStoresRepositoryInterface $juasoonlineStoresRepository
     */
    public function __construct( JuasoonlineStoresRepositoryInterface $juasoonlineStoresRepository )
    {
        $this -> theRepository = $juasoonlineStoresRepository;
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStore( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> getStore( $store );
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStoreProducts( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> getStoreProducts( $store );
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStoreCategories( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> getStoreCategories( $store );
    }

    /**
     * @param Store $store
     * @param Product $product
     * @return AnonymousResourceCollection
     */
    public function getStoreRecommendations( Store $store, Product $product ) : AnonymousResourceCollection
    {
        return $this -> theRepository -> getStoreRecommendations( $store, $product );
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStoreTopSelling( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> getStoreTopSelling( $store );
    }

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function getStoreStats( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> getStoreStats( $store );
    }
}
