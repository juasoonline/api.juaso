<?php

namespace App\Http\Controllers\Business\Resource\Store\Coupon;

use App\Repositories\Business\Resource\Store\Coupon\CouponRepositoryInterface;
use App\Http\Requests\Business\Resource\Store\Coupon\CouponRequest;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Coupon\Coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CouponController extends Controller
{
    private $theRepository;

    /**
     * CouponController constructor.
     * @param CouponRepositoryInterface $storeCouponRepository
     */
    public function __construct( CouponRepositoryInterface $storeCouponRepository )
    {
        $this -> theRepository = $storeCouponRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> index( $store );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $store
     * @param CouponRequest $storeCouponRequest
     * @return JsonResponse
     */
    public function store( Store $store, CouponRequest $storeCouponRequest ) : JsonResponse
    {
        return $this -> theRepository -> store( $store, $storeCouponRequest );
    }

    /**
     * Display the specified resource.
     *
     * @param Store $store
     * @param Coupon $storeCoupon
     * @return JsonResponse
     */
    public function show( Store $store, Coupon $storeCoupon ) : JsonResponse
    {
        return $this -> theRepository -> show( $store, $storeCoupon );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @param CouponRequest $storeCouponRequest
     * @param Coupon $storeCoupon
     * @return JsonResponse
     */
    public function update( Store $store, CouponRequest $storeCouponRequest, Coupon $storeCoupon ) : JsonResponse
    {
        return $this -> theRepository -> update( $store, $storeCouponRequest, $storeCoupon );
    }
}
