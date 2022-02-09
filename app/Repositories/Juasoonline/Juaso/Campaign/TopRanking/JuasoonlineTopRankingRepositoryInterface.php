<?php

namespace App\Repositories\Juasoonline\Juaso\Campaign\TopRanking;

use Illuminate\Http\JsonResponse;

interface JuasoonlineTopRankingRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function getTopRankings() : JsonResponse;
}
