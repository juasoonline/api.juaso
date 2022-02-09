<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\Sale;

use App\Http\Resources\Juasoonline\Juaso\Sale\Sale\JuasoonlineSaleResource;
use App\Models\Juaso\Resource\Sale\Sale\Sale;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineSaleRepository implements JuasoonlineSaleRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @param Sale $sale
     * @return JsonResponse
     */
    public function getSale( Sale $sale ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $sale -> load( $this -> relationships ); }
        return $this -> successResponse( new JuasoonlineSaleResource( $sale ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Sale $sale
     * @return JsonResponse
     */
    public function getCategories( Sale $sale ) : JsonResponse
    {
        return $this -> isSalesActive( $sale ) ? $this -> successResponse( new JuasoonlineSaleResource( $sale ), "Success", null, Response::HTTP_OK ) : $this -> errorResponse("", "Error", "Resource not found", Response::HTTP_NOT_FOUND );
    }

    /**
     * @param Sale $sale
     * @return bool
     */
    private function isSalesActive( Sale $sale ) : bool
    {
        return ( bool ) Sale::where('resource_id', '=', $sale -> resource_id ) ->  where( 'status', '=', '000' ) -> count();
    }
}
