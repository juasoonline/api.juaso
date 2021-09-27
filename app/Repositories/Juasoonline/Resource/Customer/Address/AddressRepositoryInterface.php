<?php

namespace App\Repositories\Juasoonline\Resource\Customer\Address;

use App\Http\Requests\Juasoonline\Resource\Customer\Address\AddressRequest;
use App\Models\Juasoonline\Resource\Customer\Address\Address;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use Illuminate\Http\JsonResponse;

interface AddressRepositoryInterface
{
    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function index( Customer $customer ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param AddressRequest $addressRequest
     * @return JsonResponse
     */
    public function store( Customer $customer, AddressRequest $addressRequest ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param Address $address
     * @return JsonResponse
     */
    public function show( Customer $customer, Address $address ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param AddressRequest $addressRequest
     * @param Address $address
     * @return JsonResponse
     */
    public function update( Customer $customer, AddressRequest $addressRequest, Address $address ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param Address $address
     * @return JsonResponse
     */
    public function destroy( Customer $customer, Address $address ) : JsonResponse;
}
