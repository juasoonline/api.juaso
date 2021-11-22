<?php

namespace App\Http\Controllers\Juasoonline\Business\Campaign\WeeklyDeal;

use App\Repositories\Juasoonline\Business\Campaign\WeeklyDeal\JuasoonlineWeeklyDealRepositoryInterface;

use App\Http\Controllers\Controller;

class JuasoonlineWeeklyDealController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineWeeklyDealController constructor.
     * @param JuasoonlineWeeklyDealRepositoryInterface $juasoonlineWeeklyDealRepository
     */
    public function __construct( JuasoonlineWeeklyDealRepositoryInterface $juasoonlineWeeklyDealRepository )
    {
        $this -> theRepository = $juasoonlineWeeklyDealRepository;
    }

    /**
     * @return array
     */
    public function getWeeklyDeals()
    {
        return $this -> theRepository -> getWeeklyDeals( );
    }
}
