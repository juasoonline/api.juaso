<?php

namespace App\Repositories\Business\Resource\Store\Coupon;

use App\Http\Requests\Business\Resource\Store\Coupon\CouponRequest;
use App\Http\Resources\Business\Resource\Store\Coupon\CouponResource;
use App\Jobs\Business\Resource\Store\Coupon\CreateCoupon;
use App\Jobs\Business\Resource\Store\Coupon\UpdateCoupon;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Coupon\Coupon;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CouponRepository implements CouponRepositoryInterface
{
    use apiResponseBuilder; use Relatives;

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse
    {
        return $this -> successResponse( CouponResource::collection( $store -> coupons() -> get() ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param CouponRequest $storeCouponRequest
     * @return JsonResponse
     */
    public function store( Store $store, CouponRequest $storeCouponRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateCoupon( $store, $storeCouponRequest ) ) -> handle(), "Success", "Coupon created", Response::HTTP_CREATED );
    }

    /**
     * @param Store $store
     * @param Coupon $storeCoupon
     * @return JsonResponse
     */
    public function show( Store $store, Coupon $storeCoupon ) : JsonResponse
    {
        checkResourceRelation( $store -> coupons() -> where( 'store_coupons.id', $storeCoupon -> id ) -> count());
        if ( $this -> loadRelationships() ) { $storeCoupon -> load( $this -> relationships ); }
        return $this -> successResponse( new CouponResource( $storeCoupon ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param CouponRequest $storeCouponRequest
     * @param Coupon $storeCoupon
     * @return JsonResponse
     */
    public function update( Store $store, CouponRequest $storeCouponRequest, Coupon $storeCoupon ) : JsonResponse
    {
        checkResourceRelation( $store -> coupons() -> where( 'store_coupons.id', $storeCoupon -> id ) -> count());
        return $this -> successResponse( ( new UpdateCoupon( $storeCouponRequest, $storeCoupon ) ) -> handle(), 'Success', 'Coupon updated', Response::HTTP_OK );
    }
}
