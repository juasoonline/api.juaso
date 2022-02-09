<?php

namespace App\Repositories\Juasoonline\Juaso\Campaign\FlashDeal;

use App\Http\Resources\Juasoonline\Juaso\Campaign\FlashDeal\JuasoonlineFlashDealResource;
use App\Models\Juaso\Resource\Campaign\FlashDeal\FlashDeal;

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
    public function getHotDeals()
    {
        $flashDeals = FlashDeal::query() -> where( 'status', '=', 000 ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineFlashDealResource::collection( $flashDeals ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
