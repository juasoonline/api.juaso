<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Campaign\FlashDeal;

use App\Repositories\Juasoonline\Juaso\Campaign\FlashDeal\JuasoonlineFlashDealRepositoryInterface;

use App\Http\Controllers\Controller;


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
    public function getHotDeals()
    {
        return $this -> theRepository -> getHotDeals();
    }
}
