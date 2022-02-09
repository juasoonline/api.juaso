<?php

namespace App\Repositories\Juasoonline\Juaso\Sale\BlackFriday;

use App\Http\Resources\Juasoonline\Juaso\Sale\BlackFriday\JuasoonlineBlackFridayCategoryResource;
use App\Http\Resources\Juasoonline\Juaso\Sale\BlackFriday\JuasoonlineBlackFridayResource;
use App\Models\Juaso\Resource\Sale\BlackFriday\BlackFriday;

use App\Models\Juaso\Resource\Sale\Category\Category;
use App\Models\Juaso\Resource\Sale\Sale\Sale;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineBlackFridayRepository implements JuasoonlineBlackFridayRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        $flashDeals = BlackFriday::query() -> where( 'status', '=', 000 ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineBlackFridayResource::collection( $flashDeals ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @return JsonResponse
     */
    public function getProductCategories() : JsonResponse
    {
        if ( $this -> isSalesActive() )
        {
            $Categories = Category::query() -> with('black_fridays') -> distinct() -> get();
            return $this -> successResponse( JuasoonlineBlackFridayCategoryResource::collection( $Categories ), "Success", null, Response::HTTP_OK );
        }
        else { return $this -> errorResponse( "", "Error", "Resource not found", Response::HTTP_NOT_FOUND ); }
    }

    /**
     * @return bool
     */
    private function isSalesActive() : bool
    {
        return ( bool ) Sale::where('resource_id', '=', 9582985 ) -> where( 'status', '=', '000' ) -> count();
    }
}
