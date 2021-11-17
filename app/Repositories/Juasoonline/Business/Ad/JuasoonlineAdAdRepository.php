<?php

namespace App\Repositories\Juasoonline\Business\Ad;

use App\Http\Resources\Juasoonline\Business\Product\Product\JuasoonlineProductNewArrivalResource;
use App\Http\Resources\Juasoonline\Resource\Promotion\FlashDealsResource;
use App\Http\Resources\Juasoonline\Resource\Promotion\SliderResource;

use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Product\Promotion\Promotion;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineAdAdRepository implements JuasoonlineAdRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getSliders() : JsonResponse
    {
        $deals = Promotion::where('promo_type_id', '=', 2 ) -> where('status', '=', 000) -> get();
        return $this -> successResponse( SliderResource::collection( $deals ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @return JsonResponse
     */
    public function getFlashDeals() : JsonResponse
    {
        $deals = Promotion::where( 'promo_type_id', '=', 3 ) -> where('status', '=', 000 ) -> get();
        return $this -> successResponse( FlashDealsResource::collection( $deals ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @return JsonResponse
     */
    public function getNewArrivals() : JsonResponse
    {
        $newArrivals = Product::where('status', '=', 000 ) -> orderBy( 'id', 'desc' ) -> paginate( 20 );
        return $this -> successResponse( JuasoonlineProductNewArrivalResource::collection( $newArrivals ), "Success", null, Response::HTTP_OK );
    }
}
