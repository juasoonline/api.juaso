<?php


namespace App\Repositories\Juasoonline\Juaso\Campaign\TopRanking;

use App\Http\Resources\Juasoonline\Juaso\Campaign\TopRanking\JuasoonlineTopRankingResource;
use App\Models\Business\Resource\Product\Product\Product;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineTopRankingRepository implements JuasoonlineTopRankingRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getTopRankings() : JsonResponse
    {
        $flashDeals = Product::query() -> where( 'status', '=', 000 ) -> orderByDesc( 'created_at' ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineTopRankingResource::collection( $flashDeals ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
