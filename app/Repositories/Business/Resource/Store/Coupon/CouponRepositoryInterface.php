<?php

namespace App\Repositories\Business\Resource\Store\Coupon;

use App\Http\Requests\Business\Resource\Store\Coupon\CouponRequest;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Coupon\Coupon;
use Illuminate\Http\JsonResponse;

interface CouponRepositoryInterface
{
    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse;

    /**
     * @param Store $store
     * @param CouponRequest $storeCouponRequest
     * @return JsonResponse
     */
    public function store(Store $store, CouponRequest $storeCouponRequest ) : JsonResponse;

    /**
     * @param Store $store
     * @param Coupon $storeCoupon
     * @return JsonResponse
     */
    public function show(Store $store, Coupon $storeCoupon ) : JsonResponse;

    /**
     * @param Store $store
     * @param CouponRequest $storeCouponRequest
     * @param Coupon $storeCoupon
     * @return JsonResponse
     */
    public function update(Store $store, CouponRequest $storeCouponRequest, Coupon $storeCoupon ) : JsonResponse;
}
