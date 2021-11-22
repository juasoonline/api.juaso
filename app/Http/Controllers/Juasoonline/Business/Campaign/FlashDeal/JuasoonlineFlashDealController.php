<?php

namespace App\Http\Controllers\Juasoonline\Business\Campaign\FlashDeal;

use App\Http\Controllers\Controller;

use App\Repositories\Juasoonline\Business\Campaign\FlashDeal\JuasoonlineFlashDealRepositoryInterface;

class JuasoonlineFlashDealController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineFlashDealController constructor.
     * @param JuasoonlineFlashDealRepositoryInterface $juasoonlineFlashDealRepository
     */
    public function __construct( JuasoonlineFlashDealRepositoryInterface $juasoonlineFlashDealRepository )
    {
        $this -> theRepository = $juasoonlineFlashDealRepository;
    }

    /**
     * @return array
     */
    public function getCurrentFlashDeals()
    {
        return $this -> theRepository -> getCurrentFlashDeals( );
    }
}
