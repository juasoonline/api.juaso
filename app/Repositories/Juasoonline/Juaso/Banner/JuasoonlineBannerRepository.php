<?php

namespace App\Repositories\Juasoonline\Juaso\Banner;

use App\Http\Resources\Juasoonline\Juaso\Banner\JuasoonlineBannerResource;

use App\Models\Juaso\Resource\Banner\Banner;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineBannerRepository implements JuasoonlineBannerRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getBanners() : JsonResponse
    {
        $deals = Banner::where( 'status', '=', 000 ) -> limit( 1 ) -> get();
        return $this -> successResponse( JuasoonlineBannerResource::collection( $deals ), "Success", null, Response::HTTP_OK );
    }
}
