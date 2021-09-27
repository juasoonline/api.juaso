<?php

namespace App\Http\Controllers\Juasoonline\Resource\Customer\Order;

use App\Http\Requests\Juasoonline\Resource\Customer\Order\OrderRequest;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Models\Juasoonline\Resource\Customer\Order\Order;

use App\Repositories\Juasoonline\Resource\Customer\Order\OrderRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    private $theRepository;

    /**
     * CustomerController constructor.
     *
     * @param OrderRepositoryInterface $orderRepository
     */
    public function __construct( OrderRepositoryInterface $orderRepository )
    {
        $this -> theRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Customer $customer
     * @return JsonResponse
     */
    public function index( Customer $customer ) : JsonResponse
    {
        return $this -> theRepository -> index( $customer );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @return JsonResponse
     */
    public function store( Customer $customer, OrderRequest $orderRequest ) : JsonResponse
    {
        return $this -> theRepository -> store( $customer, $orderRequest );
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @param Order $order
     * @return JsonResponse
     */
    public function show( Customer $customer, Order $order ) : JsonResponse
    {
        return $this -> theRepository -> show( $customer, $order );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function updateQuantity( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        return $this -> theRepository -> updateQuantity( $customer, $orderRequest, $order );
    }

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function updateCoupon( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        return $this -> theRepository -> updateCoupon( $customer, $orderRequest, $order );
    }

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function updatePromo( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        return $this -> theRepository -> updatePromo( $customer, $orderRequest, $order );
    }

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function updateDeliveryMethod( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        return $this -> theRepository -> updateDeliveryMethod( $customer, $orderRequest, $order );
    }

    /**
     * @param Customer $customer
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return JsonResponse
     */
    public function orderConfirmation( Customer $customer, OrderRequest $orderRequest, Order $order ) : JsonResponse
    {
        return $this -> theRepository -> orderConfirmation( $customer, $orderRequest, $order );
    }
}
