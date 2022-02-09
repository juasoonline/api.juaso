<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Sale\AnniversarySale;

use App\Repositories\Juasoonline\Juaso\Sale\AnniversarySale\JuasoonlineAnniversarySaleRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineAnniversarySaleController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineAnniversarySaleController constructor.
     * @param JuasoonlineAnniversarySaleRepositoryInterface $juasoonlineAnniversarySaleRepository
     */
    public function __construct( JuasoonlineAnniversarySaleRepositoryInterface $juasoonlineAnniversarySaleRepository )
    {
        $this -> theRepository = $juasoonlineAnniversarySaleRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        return $this -> theRepository -> getSales();
    }
}
