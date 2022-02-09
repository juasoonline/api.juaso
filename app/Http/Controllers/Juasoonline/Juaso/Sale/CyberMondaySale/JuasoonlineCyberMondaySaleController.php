<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Sale\CyberMondaySale;

use App\Repositories\Juasoonline\Juaso\Sale\CyberMondaySale\JuasoonlineCyberMondaySaleRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineCyberMondaySaleController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineCyberMondaySaleController constructor.
     * @param JuasoonlineCyberMondaySaleRepositoryInterface $juasoonlineCyberMondaySaleRepository
     */
    public function __construct( JuasoonlineCyberMondaySaleRepositoryInterface $juasoonlineCyberMondaySaleRepository )
    {
        $this -> theRepository = $juasoonlineCyberMondaySaleRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        return $this -> theRepository -> getSales();
    }
}
