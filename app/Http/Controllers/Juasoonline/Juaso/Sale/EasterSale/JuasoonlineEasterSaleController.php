<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Sale\EasterSale;

use App\Repositories\Juasoonline\Juaso\Sale\EasterSale\JuasoonlineEasterSaleRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineEasterSaleController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineEasterSaleController constructor.
     * @param JuasoonlineEasterSaleRepositoryInterface $juasoonlineEasterSaleRepository
     */
    public function __construct( JuasoonlineEasterSaleRepositoryInterface $juasoonlineEasterSaleRepository )
    {
        $this -> theRepository = $juasoonlineEasterSaleRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        return $this -> theRepository -> getSales();
    }
}
