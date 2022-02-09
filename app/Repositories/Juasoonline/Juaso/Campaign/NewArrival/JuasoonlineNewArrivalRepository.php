<?php


namespace App\Repositories\Juasoonline\Juaso\Campaign\NewArrival;

use App\Http\Resources\Juasoonline\Juaso\Campaign\NewArrival\JuasoonlineNewArrivalResource;
use App\Models\Business\Resource\Product\Product\Product;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineNewArrivalRepository implements JuasoonlineNewArrivalRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getNewArrivals() : JsonResponse
    {
        $flashDeals = Product::query() -> where( 'status', '=', 000 ) -> orderByDesc( 'created_at' ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineNewArrivalResource::collection( $flashDeals ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
