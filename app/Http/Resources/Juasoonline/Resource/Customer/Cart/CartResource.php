<?php

namespace App\Http\Resources\Juasoonline\Resource\Customer\Cart;

use App\Http\Resources\Business\Resource\Product\Bundle\BundleResource;
use App\Http\Resources\Business\Resource\Product\Color\ColorResource;
use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use App\Http\Resources\Business\Resource\Product\Size\SizeResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|mixed
     */
    public function toArray( $request ) : array
    {
        return
        [
            'type'                  => 'Cart',

            'attributes' =>
            [
                'resource_id'       => $this -> resource -> resource_id,
                'quantity'          => $this -> resource -> quantity,
                'created_at'        => $this -> resource -> created_at -> toDateTimeString(),
            ],

            'product'               => new ProductResource( $this -> resource -> product ),
            'color'                 => new ColorResource( $this -> resource -> color ),
            'size'                  => new SizeResource( $this -> resource -> size ),
            'bundle'                => new BundleResource( $this -> resource -> bundle ),
        ];
    }
}
