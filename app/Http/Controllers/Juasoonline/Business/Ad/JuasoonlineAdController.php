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
    public function getSliders() : JsonResponse
    {
        return $this -> theRepository -> getSliders();
    }

    /**
     * @return JsonResponse
     */
    public function getFlashDeals() : JsonResponse
    {
        return $this -> theRepository -> getFlashDeals();
    }

    /**
     * @return JsonResponse
     */
    public function getNewArrivals() : JsonResponse
    {
        return $this -> theRepository -> getNewArrivals();
    }
}
