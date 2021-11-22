<?php

namespace App\Repositories\Juasoonline\Business\Campaign\WeeklyDeal;

use Illuminate\Http\JsonResponse;

interface JuasoonlineWeeklyDealRepositoryInterface
{
    /**
     * @return array
     */
    public function getWeeklyDeals();
}
