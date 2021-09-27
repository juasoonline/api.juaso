<?php

namespace App\Http\Resources\Juasoonline\Resource\Customer\Order;

use App\Http\Resources\Business\Resource\Product\Bundle\BundleResource;
use App\Http\Resources\Business\Resource\Product\Color\ColorResource;
use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use App\Http\Resources\Business\Resource\Product\Size\SizeResource;
use App\Http\Resources\Juaso\Resource\DeliveryMethod\DeliveryMethodResource;
use App\Http\Resources\Juaso\Resource\PaymentMethod\PaymentMethodResource;

use App\Http\Resources\Juasoonline\Resource\Customer\Customer\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class OrderResource extends JsonResource
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
            'type'                          => 'Order',

            'attributes'                    =>
            [
                'resource_id'               => $this -> resource -> resource_id,
                'order_id'                  => $this -> resource -> order_id,
                'quantity'                  => $this -> resource -> quantity,
                'status'                    => $this -> resource -> status,

                'created_at'                => $this -> resource -> created_at -> toDateTimeString(),
            ],

            'product'                       => new ProductResource( $this -> resource -> product ),
            'color'                         => new ColorResource( $this -> resource -> color ),
            'size'                          => new SizeResource( $this -> resource -> size ),
            'bundle'                        => new BundleResource( $this -> resource -> bundle ),
            'delivery_method'               => new DeliveryMethodResource( $this -> resource -> delivery_method ),

            'include'                       => $this -> when( $this -> relationLoaded( 'customer' ),
            [
                'customer'                  => new CustomerResource( $this -> whenLoaded( 'customer' )),
            ])
        ];
    }
}
