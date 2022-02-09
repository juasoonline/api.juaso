<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Sale\Sale;

use App\Http\Controllers\Controller;
use App\Models\Juaso\Resource\Sale\Sale\Sale;
use App\Repositories\Juasoonline\Juaso\Sale\Sale\JuasoonlineSaleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JuasoonlineSaleController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineSaleController constructor.
     * @param JuasoonlineSaleRepositoryInterface $juasoonlineSaleTypeRepository
     */
    public function __construct( JuasoonlineSaleRepositoryInterface $juasoonlineSaleTypeRepository )
    {
        $this -> theRepository = $juasoonlineSaleTypeRepository;
    }

    /**
     * @param Sale $sale
     * @return JsonResponse
     */
    public function getSale( Sale $sale ) : JsonResponse
    {
        return $this -> theRepository -> getSale( $sale );
    }

    /**
     * @param Sale $sale
     * @return JsonResponse
     */
    public function getCategories( Sale $sale ) : JsonResponse
    {
        return $this -> theRepository -> getCategories( $sale );
    }
}
