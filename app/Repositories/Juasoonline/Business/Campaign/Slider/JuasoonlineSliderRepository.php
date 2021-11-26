<?php

namespace App\Repositories\Juasoonline\Business\Campaign\Slider;

use App\Http\Resources\Juasoonline\Business\Campaign\Slider\JuasoonlineSliderResource;

use App\Models\Business\Resource\Campaign\Slider\Slider;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineSliderRepository implements JuasoonlineSliderRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getSliders() : JsonResponse
    {
        $deals = Slider::where( 'status', '=', 000 ) -> get();
        return $this -> successResponse( JuasoonlineSliderResource::collection( $deals ), "Success", null, Response::HTTP_OK );
    }
}
