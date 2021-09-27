<?php

namespace App\Repositories\Juasoonline\Resource\Customer\Order;

use App\Http\Requests\Juasoonline\Resource\Customer\Order\OrderRequest;
use App\Http\Resources\Juasoonline\Resource\Customer\Order\OrderResource;
use App\Jobs\Juasoonline\Resource\Customer\Order\CreateOrder;
use App\Jobs\Juasoonline\Resource\Customer\Order\UpdateOrder;
use App\Models\Juaso\Resource\DeliveryMethod\DeliveryMethod;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Models\Juasoonline\Resource\Customer\Order\Order;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class OrderRepository implements OrderRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function index( Customer $customer ) : JsonResponse
    {
        $order = Order::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); }) -> get();
        return $this -> successResponse( OrderResource::collection( $order ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @return JsonResponse
     */
    public function store( Customer $customer, OrderRequest $orderRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateOrder( $customer, $orderRequest ) ) -> handle(), "Success", "Order created", Response::HTTP_CREATED );
    }

    /**
     * @param $customer
     * @param Order $order
     * @return JsonResponse
     */
    public function show( Customer $customer, Order $order ) : JsonResponse
    {
        checkResourceRelation( $customer -> orders() -> where( 'orders.id', $order -> id ) -> count());
        if ( $this -> loadRelationships() ) { $order -> load( $this -> relationships ); }
        return $this -> successResponse( new OrderResource( $order ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse|mixed
     */
    public function updateQuantity( $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        return $this -> successResponse( ( new UpdateOrder( $orderRequest, $order ) ) -> handle(), "Success", "Order quantity updated", Response::HTTP_CREATED );
    }

    /**
     * @param $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse|mixed
     */
    public function updateCoupon( $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        return $this -> successResponse( ( new UpdateOrder( $orderRequest, $order ) ) -> handle(), "Success", "Order coupon updated", Response::HTTP_CREATED );
    }

    /**
     * @param $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse|mixed
     */
    public function updatePromo( $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        return $this -> successResponse( ( new UpdateOrder( $orderRequest, $order ) ) -> handle(), "Success", "Order promotion updated", Response::HTTP_CREATED );
    }

    /**
     * @param $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse|mixed
     */
    public function updateDeliveryMethod( $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        $theDeliveryMethod = DeliveryMethod::where( 'resource_id', '=', $orderRequest -> input( 'data.attributes.delivery_method_id' ) ) -> first( 'id' );

        $data = $orderRequest -> request -> all();
        $data['data']['attributes']['delivery_method_id'] = $theDeliveryMethod -> id;
        $orderRequest -> merge( $data );

        return $this -> successResponse( ( new UpdateOrder( $orderRequest, $order ) ) -> handle(), "Success", "Order coupon updated", Response::HTTP_CREATED );
    }

    /**
     * @param $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse|mixed
     */
    public function orderConfirmation( $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        // Process payment

        // Update order transaction

        // Send receipt
    }
}
