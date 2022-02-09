<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Campaign\TopRanking;

use App\Http\Controllers\Controller;
use App\Repositories\Juasoonline\Juaso\Campaign\TopRanking\JuasoonlineTopRankingRepositoryInterface;
use Illuminate\Http\JsonResponse;

class JuasoonlineTopRankingController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineTopRankingController constructor.
     * @param JuasoonlineTopRankingRepositoryInterface $juasoonlineTopRankingRepository
     */
    public function __construct( JuasoonlineTopRankingRepositoryInterface $juasoonlineTopRankingRepository )
    {
        $this -> theRepository = $juasoonlineTopRankingRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getTopRankings() : JsonResponse
    {
        return $this -> theRepository -> getTopRankings();
    }
}
