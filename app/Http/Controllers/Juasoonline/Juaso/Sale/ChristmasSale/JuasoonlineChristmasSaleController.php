<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Sale\ChristmasSale;

use App\Repositories\Juasoonline\Juaso\Sale\ChristmasSale\JuasoonlineChristmasSaleRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineChristmasSaleController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineChristmasSaleController constructor.
     * @param JuasoonlineChristmasSaleRepositoryInterface $juasoonlineChristmasSaleRepository
     */
    public function __construct( JuasoonlineChristmasSaleRepositoryInterface $juasoonlineChristmasSaleRepository )
    {
        $this -> theRepository = $juasoonlineChristmasSaleRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        return $this -> theRepository -> getSales();
    }
}
