<?php

namespace App\Http\Controllers\Juasoonline\Business\Product;

use App\Models\Business\Resource\Product\Product\Product;
use App\Repositories\Juasoonline\Business\Product\JuasoonlineProductsRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class JuasoonlineProductController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineAdController constructor.
     * @param JuasoonlineProductsRepositoryInterface $juasoonlineProductsRepository
     */
    public function __construct( JuasoonlineProductsRepositoryInterface $juasoonlineProductsRepository )
    {
        $this -> theRepository = $juasoonlineProductsRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection
    {
        return $this -> theRepository -> index();
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function show( Product $product ) : JsonResponse
    {
        return $this -> theRepository -> show( $product );
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function getRecommendations( Product $product ) : JsonResponse
    {
        return $this -> theRepository -> getRecommendations( $product );
    }

    /**
     * @return JsonResponse
     */
    public function getTopRankings() : JsonResponse
    {
        return $this -> theRepository -> getTopRankings();
    }
}
