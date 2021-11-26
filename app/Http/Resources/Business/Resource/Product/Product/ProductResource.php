<?php

namespace App\Http\Resources\Business\Resource\Product\Product;

use App\Http\Resources\Business\Resource\Product\Faq\FaqResource;
use App\Http\Resources\Business\Resource\Store\Category\Subcategory\SubcategoryResource as StoreSubcategoryResource;
use App\Http\Resources\Juaso\Resource\Brand\BrandResource;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\SubcategoryResource;

use App\Http\Resources\Business\Resource\Store\Charge\ChargeResource;
use App\Http\Resources\Business\Resource\Store\Store\StoreResource;
use App\Http\Resources\Business\Resource\Product\Overview\OverviewResource;
use App\Http\Resources\Business\Resource\Product\Specification\SpecificationResource;
use App\Http\Resources\Business\Resource\Product\Bundle\BundleResource;
use App\Http\Resources\Business\Resource\Product\Image\ImageResource;
use App\Http\Resources\Business\Resource\Product\Review\ReviewResource;
use App\Http\Resources\Business\Resource\Product\Size\SizeResource;
use App\Http\Resources\Business\Resource\Product\Color\ColorResource;
use App\Http\Resources\Business\Resource\Product\Tag\TagResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method relationLoaded( string $string )
 */
class ProductResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray( $request ) : array
    {
        return
        [
            'type'                          => 'Product',

            'attributes' =>
            [
                'resource_id'               => $this -> resource -> resource_id,

                'name'                      => $this -> resource -> name,
                'brand'                     => $this -> resource -> productBrand -> name,
                'sku'                       => $this -> when( $request -> is( 'juasoonline/*' ), $this -> resource -> sku ),
                'slug'                      => $this -> resource -> slug,
                'description'               => $this -> resource -> description,

                'pricing'                   => $this -> resource -> pricing,

                'free_delivery'             => $this -> resource -> free_delivery,

                'buyer_protection'          => $this -> resource -> buyer_protection,
                'quantity'                  => $this -> resource -> quantity,
                'total_sold'                => $this -> resource -> total_sold,

                'image'                     => $this -> resource -> mainImage[0]['image'],
                'average_rating'            => calculateAverage( $this -> resource -> review -> where( 'rating', 5 ) -> count(), $this -> resource -> review -> where( 'rating', 4 ) -> count(), $this -> resource -> review -> where( 'rating', 3 ) -> count(), $this -> resource -> review -> where( 'rating', 2 ) -> count(), $this -> resource -> review -> where( 'rating', 1 ) -> count() ),

                'status'                    => $this -> when( $request -> is( 'juasoonline/*' ), $this -> resource -> status ),

                'created_at'                => $this -> when( $request -> is( 'juasoonline/*' ), $this -> resource -> created_at -> toDateTimeString()),
                'updated_at'                => $this -> when( $request -> is( 'juasoonline/*' ), $this -> resource -> updated_at -> toDateTimeString()),
            ],

            'ratings'                       => $this -> when( $request -> query( 'ratings'), getRating( $this -> resource -> review -> where( 'rating', 5 ) -> count(), $this -> resource -> review -> where( 'rating', 4 ) -> count(), $this -> resource -> review -> where( 'rating', 3 ) -> count(), $this -> resource -> review -> where( 'rating', 2 ) -> count(), $this -> resource -> review -> where( 'rating', 1 ) -> count() ) ),
            'pricing'                       => getPricing( $this -> resource -> resource_id ),
            'wishlist'                      => $this -> resource -> wishlist -> count(),

            'include'                       => $this -> when( $this -> relationLoaded( 'store' ) || $this -> relationLoaded( 'brand' ) || $this -> relationLoaded( 'charge' ) || $this -> relationLoaded( 'store_categories' ) || $this -> relationLoaded( 'categories' ) || $this -> relationLoaded( 'tags' ) || $this -> relationLoaded( 'specifications' ) || $this -> relationLoaded( 'reviews' ) || $this -> relationLoaded( 'overviews' ) || $this -> relationLoaded( 'images' ) || $this -> relationLoaded( 'colors' ) || $this -> relationLoaded( 'sizes' ) || $this -> relationLoaded( 'faqs' ) || $this -> relationLoaded( 'bundles' ),
            [
                'brand'                     => new BrandResource( $this -> whenLoaded('brand')),
                'charge'                    => new ChargeResource( $this -> whenLoaded('charge')),

                'store'                     => new StoreResource( $this -> whenLoaded('store')),
                'store_categories'          => StoreSubcategoryResource::collection( $this -> whenLoaded('store_categories')),
                'categories'                => SubcategoryResource::collection( $this -> whenLoaded('categories')),
                'tags'                      => TagResource::collection( $this -> whenLoaded('tags')),
                'specifications'            => SpecificationResource::collection( $this -> whenLoaded('specifications')),
                'images'                    => ImageResource::collection( $this -> whenLoaded('images')),
                'colors'                    => ColorResource::collection( $this -> whenLoaded('colors')),
                'sizes'                     => SizeResource::collection( $this -> whenLoaded('sizes')),
                'bundles'                   => BundleResource::collection( $this -> whenLoaded('bundles')),
                'overviews'                 => OverviewResource::collection( $this -> whenLoaded('overviews')),
                'reviews'                   => ReviewResource::collection( $this -> whenLoaded('reviews')),
                'faqs'                      => FaqResource::collection( $this -> whenLoaded('faqs')),
            ])
        ];
    }
}
