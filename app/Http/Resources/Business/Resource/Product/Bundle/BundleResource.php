<?php

namespace App\Http\Resources\Business\Resource\Product\Bundle;

use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded(string $string)
 */
class BundleResource extends JsonResource
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
            'type'                          => 'Bundle',

            'attributes' =>
            [
                'resource_id'               => $this -> resource -> resource_id,

                'bundle'                    => $this -> resource -> bundle,
                'description'               => $this -> resource -> description,
                'image'                     => $this -> resource -> image,

                'raw_price'                 => $this -> when($this -> resource -> currentProduct -> pricing === "Bundle", $this -> resource -> price ),
                'raw_sales_price'           => $this -> when($this -> resource -> currentProduct -> pricing === "Bundle", $this -> resource -> sales_price ),

                'price'                     => $this -> when($this -> resource -> currentProduct -> pricing === "Bundle", "GHS " . number_format( $this -> resource -> price, 2 ) ),
                'sales_price'               => $this -> when($this -> resource -> currentProduct -> pricing === "Bundle", "GHS " . number_format( $this -> resource -> sales_price, 2 ) ),

                'discount_amount'           => $this -> when($this -> resource -> currentProduct -> pricing === "Bundle", round(( $this -> resource -> price - $this -> resource -> sales_price ), 2 ) ),
                'discount_percentage'       => $this -> when($this -> resource -> currentProduct -> pricing === "Bundle", ( $this -> resource -> price - $this -> resource -> sales_price ) / 100 . "%" ),

                'quantity'                  => $this -> resource -> quantity,
                'total_sold'                => $this -> resource -> total_sold,
            ],

            'include'                       => $this -> when( $this -> relationLoaded( 'product' ),
            [
                'product'                   => new ProductResource( $this -> whenLoaded( 'product' ) ),
            ])
        ];
    }
}
