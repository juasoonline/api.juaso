<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\EasterSale;

use App\Http\Resources\Juasoonline\Juaso\Sale\EasterSale\JuasoonlineEasterSaleResource;
use App\Models\Juaso\Resource\Sale\EasterSale\EasterSale;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineEasterSaleRepository implements JuasoonlineEasterSaleRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        $EasterSale = EasterSale::query() -> where( 'status', '=', 000 ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineEasterSaleResource::collection( $EasterSale ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
