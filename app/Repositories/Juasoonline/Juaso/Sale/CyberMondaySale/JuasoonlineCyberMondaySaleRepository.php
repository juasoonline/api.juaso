<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\CyberMondaySale;

use App\Http\Resources\Juasoonline\Juaso\Sale\CyberMondaySale\JuasoonlineCyberMondaySaleResource;
use App\Models\Juaso\Resource\Sale\CyberMonday\CyberMonday;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineCyberMondaySaleRepository implements JuasoonlineCyberMondaySaleRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        $CyberMondaySale = CyberMonday::query() -> where( 'status', '=', 000 ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineCyberMondaySaleResource::collection( $CyberMondaySale ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
