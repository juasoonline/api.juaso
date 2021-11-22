<?php

namespace App\Repositories\Juasoonline\Business\Campaign\FlashDeal;

use Illuminate\Http\JsonResponse;

interface JuasoonlineFlashDealRepositoryInterface
{
    /**
     * @return array
     */
    public function getCurrentFlashDeals();
}
