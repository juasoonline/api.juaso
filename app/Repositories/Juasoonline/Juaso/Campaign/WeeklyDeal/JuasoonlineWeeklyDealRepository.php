<?php

namespace App\Repositories\Juasoonline\Juaso\Campaign\WeeklyDeal;

use App\Http\Resources\Juasoonline\Juaso\Campaign\WeeklyDeal\JuasoonlineWeeklyDealResource;
use App\Models\Juaso\Resource\Campaign\WeeklyDeal\WeeklyDeal;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineWeeklyDealRepository implements JuasoonlineWeeklyDealRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getHotDeals()
    {
        $flashDeals = WeeklyDeal::query() -> where( 'status', '=', 000 ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineWeeklyDealResource::collection( $flashDeals ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
