<?php

namespace App\Repositories\Juasoonline\Resource\Customer\Order;

use App\Http\Requests\Juasoonline\Resource\Customer\Order\OrderRequest;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Models\Juasoonline\Resource\Customer\Order\Order;
use Illuminate\Http\JsonResponse;

interface OrderRepositoryInterface
{
    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function index( Customer $customer ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @return JsonResponse
     */
    public function store( Customer $customer, OrderRequest $orderRequest ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param Order $order
     * @return JsonResponse
     */
    public function show( Customer $customer, Order $order ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function updateQuantity( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function updateCoupon( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function updatePromo( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function updateDeliveryMethod( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function orderConfirmation( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse;
}
