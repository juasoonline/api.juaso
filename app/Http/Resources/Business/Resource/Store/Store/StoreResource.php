<?php

namespace App\Http\Resources\Business\Resource\Store\Store;

use App\Http\Resources\Business\Resource\Store\Category\Category\CategoryResource;
use App\Http\Resources\Business\Resource\Store\Coupon\CouponResource;
use App\Http\Resources\Business\Resource\Store\Review\ReviewResource;
use App\Http\Resources\Business\Resource\Store\Branch\BranchResource;
use App\Http\Resources\Business\Resource\Store\Charge\ChargeResource;
use App\Http\Resources\Business\Resource\Store\Administrator\AdministratorResource;
use App\Http\Resources\Juaso\Resource\Country\CountryResource;
use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use App\Http\Resources\Juaso\Resource\Subscription\SubscriptionResource;
use App\Http\Resources\Juasoonline\Resource\Customer\Customer\CustomerResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray( $request ) : array
    {
        return
        [
            'type'                              => 'Store',

            'attributes' =>
            [
                'resource_id'                   => $this -> resource -> resource_id,

                'name'                          => $this -> resource -> name,
                'doing_business_as'             => $this -> resource -> doing_business_as,
                'slug'                          => $this -> resource -> slug,

                'region'                        => $this -> resource -> region,
                'city'                          => $this -> resource -> city,
                'address'                       => $this -> resource -> address,
                'postal_code'                   => $this -> resource -> postal_code,

                'mobile_phone'                  => $this -> resource -> mobile_phone,
                'other_phone'                   => $this -> resource -> other_phone,

                'email'                         => $this -> resource -> email,
                'website'                       => $this -> resource -> website,
                'banner_image'                  => $this -> resource -> banner_image,

                'created_at'                    => $this -> when( !$request -> is( 'api/v1/juasoonline/*' ), $this -> resource -> created_at -> toDateTimeString()),
                'updated_at'                    => $this -> when( !$request -> is( 'api/v1/juasoonline/*' ), $this -> resource -> updated_at -> toDateTimeString()),
            ],

            'include'                           => $this -> when( $this -> relationLoaded( 'country' ) || $this -> relationLoaded( 'subscription' ) || $this -> relationLoaded( 'charges' ) || $this -> relationLoaded( 'categories' ) || $this -> relationLoaded( 'administrator' ) || $this -> relationLoaded( 'branches' ) || $this -> relationLoaded( 'reviews' ) || $this -> relationLoaded( 'coupons' ) || $this -> relationLoaded( 'products' ) || $this -> relationLoaded( 'followers' ),
            [
                'country'                       => new CountryResource( $this -> whenLoaded( 'country' )),
                'subscription'                  => new SubscriptionResource( $this -> whenLoaded( 'subscription' )),
                'charges'                       => ChargeResource::collection( $this -> whenLoaded( 'charges' )),
                'categories'                    => CategoryResource::collection( $this -> whenLoaded( 'categories' )),
                'administrator'                 => new AdministratorResource( $this -> whenLoaded( 'administrator' )),
                'branches'                      => BranchResource::collection( $this -> whenLoaded( 'branches' )),
                'reviews'                       => ReviewResource::collection( $this -> whenLoaded( 'reviews' )),
                'coupons'                       => CouponResource::collection( $this -> whenLoaded( 'coupons' )),
                'products'                      => ProductResource::collection( $this -> whenLoaded( 'products' )),
                'followers'                     => CustomerResource::collection( $this -> whenLoaded( 'followers' )),
            ])
        ];
    }
}
