<?php

namespace App\Http\Controllers\Juasoonline\Business\Campaign\NewArrival;

use App\Repositories\Juasoonline\Business\Campaign\NewArrival\JuasoonlineNewArrivalRepositoryInterface;

use App\Http\Controllers\Controller;

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
     * @return array
     */
    public function getNewArrivals()
    {
        return $this -> theRepository -> getNewArrivals( );
    }
}
