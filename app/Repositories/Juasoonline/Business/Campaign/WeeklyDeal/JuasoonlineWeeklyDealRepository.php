<?php


namespace App\Repositories\Juasoonline\Business\Campaign\WeeklyDeal;

use App\Http\Resources\Juasoonline\Business\Campaign\WeeklyDeal\JuasoonlineWeeklyDealResource;
use App\Models\Business\Resource\Campaign\WeeklyDeal\WeeklyDeal;

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
    public function getWeeklyDeals()
    {
        $flashDeals = WeeklyDeal::query() -> where( 'status', '=', 000 ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineWeeklyDealResource::collection( $flashDeals ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
