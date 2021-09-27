<?php

namespace App\Repositories\Business\Resource\Store\Administrator;

use App\Http\Requests\Business\Resource\Store\Administrator\AdministratorRequest;
use App\Http\Resources\Business\Resource\Store\Administrator\AdministratorResource;
use App\Jobs\Business\Resource\Store\Administrator\CreateAdministrator;
use App\Jobs\Business\Resource\Store\Administrator\UpdateAdministrator;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Administrator\Administrator;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AdministratorRepository implements AdministratorRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @param Store $store
     * @param AdministratorRequest $storeAdministratorRequest
     * @return JsonResponse
     */
    public function store( Store $store, AdministratorRequest $storeAdministratorRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateAdministrator( $storeAdministratorRequest ) ) -> handle(), "Success", "Administrator created", Response::HTTP_CREATED );
    }

    /**
     * @param Store $store
     * @param Administrator $storeAdministrator
     * @return JsonResponse
     */
    public function show( Store $store, Administrator $storeAdministrator ) : JsonResponse
    {
        checkResourceRelation( $store -> administrator() -> where( 'store_administrators.id', $storeAdministrator -> id ) -> count());
        if ( $this -> loadRelationships() ) { $storeAdministrator -> load( $this -> relationships ); }
        return $this -> successResponse( new AdministratorResource( $storeAdministrator ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param AdministratorRequest $storeAdministratorRequest
     * @param Administrator $storeAdministrator
     * @return JsonResponse
     */
    public function update( Store $store, AdministratorRequest $storeAdministratorRequest, Administrator $storeAdministrator ) : JsonResponse
    {
        checkResourceRelation( $store -> administrator() -> where( 'store_administrators.id', $storeAdministrator -> id ) -> count());
        if ( $this -> loadRelationships() ) { $storeAdministrator -> load( $this -> relationships ); }
        return $this -> successResponse( ( new UpdateAdministrator( $storeAdministratorRequest, $storeAdministrator ) ) -> handle(), 'Success', 'Administrator updated', Response::HTTP_OK );
    }
}
