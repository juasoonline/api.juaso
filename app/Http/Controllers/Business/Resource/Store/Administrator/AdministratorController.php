<?php

namespace App\Http\Controllers\Business\Resource\Store\Administrator;

use App\Http\Requests\Business\Resource\Store\Administrator\AdministratorRequest;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Administrator\Administrator;
use App\Repositories\Business\Resource\Store\Administrator\AdministratorRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AdministratorController extends Controller
{
    private $theRepository;

    /**
     * AdministratorController constructor.
     * @param AdministratorRepositoryInterface $storeAdministratorRepository
     */
    public function __construct( AdministratorRepositoryInterface $storeAdministratorRepository )
    {
        $this -> theRepository = $storeAdministratorRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $store
     * @param AdministratorRequest $storeAdministratorRequest
     * @return JsonResponse
     */
    public function store( Store $store, AdministratorRequest $storeAdministratorRequest ) : JsonResponse
    {
        return $this -> theRepository -> store( $store, $storeAdministratorRequest );
    }

    /**
     * Display the specified resource.
     *
     * @param Store $store
     * @param Administrator $storeAdministrator
     * @return JsonResponse
     */
    public function show( Store $store, Administrator $storeAdministrator ) : JsonResponse
    {
        return $this -> theRepository -> show( $store, $storeAdministrator );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @param AdministratorRequest $storeAdministratorRequest
     * @param Administrator $storeAdministrator
     * @return JsonResponse
     */
    public function update( Store $store, AdministratorRequest $storeAdministratorRequest, Administrator $storeAdministrator ) : JsonResponse
    {
        return $this -> theRepository -> update( $store, $storeAdministratorRequest, $storeAdministrator );
    }
}
