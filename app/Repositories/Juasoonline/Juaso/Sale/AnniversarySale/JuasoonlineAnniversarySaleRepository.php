<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\AnniversarySale;

use App\Http\Resources\Juasoonline\Juaso\Sale\AnniversarySale\JuasoonlineAnniversarySaleResource;
use App\Models\Juaso\Resource\Sale\AnniversarySale\AnniversarySale;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineAnniversarySaleRepository implements JuasoonlineAnniversarySaleRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        $AnniversarySale = AnniversarySale::query() -> where( 'status', '=', 000 ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineAnniversarySaleResource::collection( $AnniversarySale ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
