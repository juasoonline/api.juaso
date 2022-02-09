<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Campaign\NewArrival;

use App\Repositories\Juasoonline\Juaso\Campaign\NewArrival\JuasoonlineNewArrivalRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineNewArrivalController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineNewArrivalController constructor.
     * @param JuasoonlineNewArrivalRepositoryInterface $juasoonlineNewArrivalRepository
     */
    public function __construct( JuasoonlineNewArrivalRepositoryInterface $juasoonlineNewArrivalRepository )
    {
        $this -> theRepository = $juasoonlineNewArrivalRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getNewArrivals() : JsonResponse
    {
        return $this -> theRepository -> getNewArrivals( );
    }
}
