<?php


namespace App\Repositories\Juasoonline\Business\Campaign\FlashDeal;


use App\Http\Resources\Juasoonline\Business\Campaign\FlashDeal\JuasoonlineFlashDealResource;
use App\Models\Business\Resource\Campaign\FlashDeal\FlashDeal;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineFlashDealRepository implements JuasoonlineFlashDealRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getCurrentFlashDeals()
    {
        $flashDeals = FlashDeal::query() -> where( 'status', '=', 000 ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineFlashDealResource::collection( $flashDeals ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
