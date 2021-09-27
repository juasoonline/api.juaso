<?php

namespace App\Repositories\Business\Resource\Store\Administrator;

use App\Http\Requests\Business\Resource\Store\Administrator\AdministratorRequest;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Administrator\Administrator;
use Illuminate\Http\JsonResponse;

interface AdministratorRepositoryInterface
{
    /**
     * @param Store $store
     * @param AdministratorRequest $storeAdministratorRequest
     * @return JsonResponse
     */
    public function store( Store $store, AdministratorRequest $storeAdministratorRequest ) : JsonResponse;

    /**
     * @param Store $store
     * @param Administrator $storeAdministrator
     * @return JsonResponse
     */
    public function show( Store $store, Administrator $storeAdministrator ) : JsonResponse;

    /**
     * @param Store $store
     * @param AdministratorRequest $storeAdministratorRequest
     * @param Administrator $storeAdministrator
     * @return JsonResponse
     */
    public function update( Store $store, AdministratorRequest $storeAdministratorRequest, Administrator $storeAdministrator )  : JsonResponse;
}
