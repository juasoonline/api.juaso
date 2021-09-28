<?php

namespace App\Repositories\Juasoonline\Juaso\Country;

use App\Http\Resources\Juaso\Resource\Brand\BrandResource;
use App\Http\Resources\Juaso\Resource\Country\CountryResource;
use App\Models\Juaso\Resource\Brand\Brand;

use App\Models\Juaso\Resource\Country\Country;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineCountryRepository implements JuasoonlineCountryRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $Country = Country::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( CountryResource::collection( $Country ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Country $country
     * @return JsonResponse
     */
    public function show( Country $country ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $country -> load( $this -> relationships ); }
        return $this -> successResponse( new CountryResource( $country ), "Success", null, Response::HTTP_OK );
    }
}
