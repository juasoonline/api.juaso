<?php

namespace App\Http\Controllers\Juasoonline\Business\Ad;

use App\Repositories\Juasoonline\Business\Ad\JuasoonlineAdRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineAdController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineAdController constructor.
     * @param JuasoonlineAdRepositoryInterface $juasoonlineAdRepository
     */
    public function __construct( JuasoonlineAdRepositoryInterface $juasoonlineAdRepository )
    {
        $this -> theRepository = $juasoonlineAdRepository;
    }

    /**
     * @return JsonResponse
     */
    public function quickDeals() : JsonResponse
    {
        return $this -> theRepository -> quickDeals();
    }

    /**
     * @return JsonResponse
     */
    public function sliderAds() : JsonResponse
    {
        return $this -> theRepository -> sliderAds();
    }
}
