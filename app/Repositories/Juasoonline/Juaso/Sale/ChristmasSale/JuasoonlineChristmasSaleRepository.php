<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\ChristmasSale;

use App\Http\Resources\Juasoonline\Juaso\Sale\ChristmasSale\JuasoonlineChristmasSaleResource;
use App\Models\Juaso\Resource\Sale\ChristmasSale\ChristmasSale;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineChristmasSaleRepository implements JuasoonlineChristmasSaleRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        $ChristmasSale = ChristmasSale::query() -> where( 'status', '=', 000 ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineChristmasSaleResource::collection( $ChristmasSale ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
