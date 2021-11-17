<?php
    use App\Models\Business\Resource\Product\Product\Product;
    use App\Models\Business\Resource\Product\Color\Color;
    use App\Models\Business\Resource\Product\Size\Size;
    use App\Models\Business\Resource\Product\Bundle\Bundle;

use App\Models\Business\Resource\Store\Store\Store;
use Illuminate\Contracts\Auth\Factory;
    use Illuminate\Contracts\Auth\Guard;
    use Illuminate\Contracts\Auth\StatefulGuard;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Support\Facades\DB;
    use Symfony\Component\HttpFoundation\Response;
    use Illuminate\Support\Str;

    /**
     * @return array|mixed
     */
    function includeResources() : array
    {
        return ( request() -> get( 'include' ) ) ? explode( ',', request() -> get( 'include' ) ) : [];
    }

    /**
     * @param bool $is_related
     * @return void
     */
    function checkResourceRelation( bool $is_related )
    {
        abort_unless( $is_related, response() -> json([ 'status' => 'Error', 'code' => Response::HTTP_CONFLICT, 'message' => 'The resource you are trying to access does not belong to this category', 'data' => null ]));
    }

    /**
     * Generate unique ID
     * @param int $length
     * @return string
     */
    function generateRegistrationCode( int $length ) : string
    {
        $number = '';
        do {
            for ( $i = $length; $i --; $i > 0 )
            {
                $number .= mt_rand(0,9);
            }
        } while ( !empty( DB::table( 'customers' ) -> where( 'verification_code', $number ) -> first([ 'verification_code' ])) );

        return $number;
    }

    /**
     * Generate unique ID
     * @param int $length
     * @return string
     */
    function generateResetPasswordCode( int $length ) : string
    {
        $number = '';
        do {
            for ( $i = $length; $i --; $i > 0 )
            {
                $number .= mt_rand(0,9);
            }
        } while ( !empty( DB::table( 'customers' ) -> where( 'password_reset_token', $number ) -> first([ 'password_reset_token' ])) );

        return $number;
    }

    /**
     * Generate unique ID
     * @param int $length
     * @return string
     */
    function generateProductID( int $length ) : string
    {
        $number = '';
        do { for ( $i = $length; $i --; $i > 0 ) { $number .= mt_rand(0,9); } }
        while ( !empty( DB::table( 'products' ) -> where( 'resource_id', $number ) -> first([ 'resource_id' ])) );

        return $number;
    }

    /**
     * Generate unique ID
     * @param int $length
     * @return string
     */
    function generateOrderID( int $length ) : string
    {
        $number = '';
        do { for ( $i = $length; $i --; $i > 0 ) { $number .= mt_rand(0,9); } }
        while ( !empty( DB::table( 'orders' ) -> where( 'order_id', $number ) -> first([ 'order_id' ])) );

        return $number;
    }

    /**
     * Generate unique ID
     * @param int $length
     * @return string
     */
    function generateCustomerID( int $length ) : string
    {
        $number = '';
        do { for ( $i = $length; $i --; $i > 0 ) { $number .= mt_rand(0,9); } }
        while ( !empty( DB::table( 'customers' ) -> where( 'resource_id', $number ) -> first([ 'resource_id' ])) );

        return $number;
    }

    /**
     * Generate unique ID
     * @param $star_5
     * @param $star_4
     * @param $star_3
     * @param $star_2
     * @param $star_1
     * @return array
     */
    function getRating( $star_5, $star_4, $star_3, $star_2, $star_1 ) : array
    {
        $total_ratings = $star_5 + $star_4 + $star_3 + $star_2 + $star_1;
        $ratings = array();

        if ( $star_5 !== 0 || $star_4 !== 0 || $star_3 !== 0 || $star_2 !== 0 || $star_1 !== 0 )
        {
            array_push($ratings, array('average_rating' => calculateAverage($star_5, $star_4, $star_3, $star_2, $star_1), 'total_rating' => $total_ratings));
            array_push($ratings, array('rating' => array('star_5' => $star_5, 'star_4' => $star_4, 'star_3' => $star_3, 'star_2' => $star_2, 'star_1' => $star_1)));
            array_push($ratings, array('rating_percentage' => array('star_5' => round(100 * $star_5 / $total_ratings, 2) . "%", 'star_4' => round(100 * $star_4 / $total_ratings, 2) . "%", 'star_3' => round(100 * $star_3 / $total_ratings, 2) . "%", 'star_2' => round(100 * $star_2 / $total_ratings, 2) . "%", 'star_1' => round(100 * $star_1 / $total_ratings, 2) . "%" )));
        }
        return $ratings;
    }

/**
 * Generate unique ID
 * @param Store $store
 * @return array
 */
    function getStoreStats( Store $store ) : array
    {
        $data = array( 'type' => 'StoreStats', 'attributes' => array(), 'stats' => array(), 'ratings' => array() );
        $rating = array
        (
            'product_description_rating'    => getRating( $store -> reviews -> where( 'product_description', 5 ) -> count(), $store -> reviews -> where( 'product_description', 4 ) -> count(), $store -> reviews -> where( 'product_description', 3 ) -> count(), $store -> reviews -> where( 'product_description', 2 ) -> count(), $store -> reviews -> where( 'product_description', 1 ) -> count() ),
            'communication_rating'          => getRating( $store -> reviews -> where( 'communication', 5 ) -> count(), $store -> reviews -> where( 'communication', 4 ) -> count(), $store -> reviews -> where( 'communication', 3 ) -> count(), $store -> reviews -> where( 'communication', 2 ) -> count(), $store -> reviews -> where( 'communication', 1 ) -> count() ),
            'overall_rating'                => getOverallPercentage( $store -> reviews -> where( 'overall', 5 ) -> count(), $store -> reviews -> where( 'overall', 4 ) -> count(), $store -> reviews -> where( 'overall', 3 ) -> count(), $store -> reviews -> where( 'overall', 2 ) -> count(), $store -> reviews -> where( 'overall', 1 ) -> count() )
        );

        array_push( $data['attributes'], array('store_name' => $store -> name, 'doing_business_as' => $store -> doing_business_as, 'resource_id' => $store -> resource_id ));
        array_push( $data['stats'], array('items' => Product::where( 'store_id', $store -> id ) -> count(), 'followers' => $store -> followers() -> count()));
        array_push( $data['ratings'], $rating );

        return $data;
    }

    /**
     * @param $star_5
     * @param $star_4
     * @param $star_3
     * @param $star_2
     * @param $star_1
     * @return string
     */
    function getOverallPercentage( $star_5, $star_4, $star_3, $star_2, $star_1 ) : string
    {
        $total_rating = $star_5 + $star_4 + $star_3 + $star_2 + $star_1;

        if ( $star_5 !== 0 || $star_4 !== 0 || $star_3 !== 0 || $star_2 !== 0 || $star_1 !== 0 )
        {
            $total_percentage = round( 100 * $star_5 / $total_rating, 2) + round(100 * $star_4 / $total_rating, 2) + round(100 * $star_3 / $total_rating, 2) + round(100 * $star_2 / $total_rating, 2) + round(100 * $star_1 / $total_rating, 2 );
            $result = $total_percentage / 5;
            return $result . "%";
        }
        else
        {
            return "96%";
        }
    }

    /**
     * Generate unique ID
     * @param $star_5
     * @param $star_4
     * @param $star_3
     * @param $star_2
     * @param $star_1
     * @return float
     */
    function calculateAverage( $star_5, $star_4, $star_3, $star_2, $star_1 ) : float
    {
        return 5 * $star_5 + 4 * $star_4 + 3 * $star_3 + 2 * $star_4 + 1 * $star_1 === 0 ? 0 : round((5 * $star_5 + 4 * $star_4 + 3 * $star_3 + 2 * $star_2 + 1 * $star_1) / ($star_5 + $star_4 + $star_3 + $star_2 + $star_1), 2);
    }

    /**
     * @param $Resource
     * @return array
     */
    function getPricing( $Resource) : array
    {
        $product = Product::where('resource_id', $Resource ) -> first();
        $data = array( 'priced' => $product -> pricing, 'price_data' => [] );

        if ( $product -> pricing === 'Product' )
        {
            array_push
            (
                $data['price_data'], array
                (
                    'price'                 => "GHS " . number_format( $product -> price, 2 ),
                    'sales_price'           => "GHS " . number_format( $product -> sales_price, 2 ),

                    'discount_amount'       => "GHS " . round(( $product -> price - $product -> sales_price ), 0 ),
                    'discount_percentage'   => ( $product -> price - $product -> sales_price ) / 100 . "%",
                )
            );
        }
        elseif ( $product -> pricing === 'Color' )
        {
            $Colors = Color::where( 'product_id', $product -> id ) -> get() -> toArray();
            array_push( $data['price_data'], array( 'price_range' => getValues( $Colors ), 'price' => "GHS " . number_format ( min( array_column( $Colors, 'price' )), 2), 'sales_price' => "GHS " . number_format ( min( array_column( $Colors, 'sales_price' )), 2), 'discount_percentage' => ( min( array_column( $Colors, 'price' )) - min( array_column( $Colors, 'sales_price' )) / 100 . "%" ) ));
        }
        elseif ( $product -> pricing === 'Size' )
        {
            $Sizes = Size::where( 'product_id', $product -> id ) -> get() -> toArray();
            array_push( $data['price_data'], array( 'price_range' => getValues( $Sizes ), 'price' => "GHS " . number_format ( min( array_column( $Sizes, 'price' )), 2), 'sales_price' => "GHS " . number_format ( min( array_column( $Sizes, 'sales_price' )), 2), 'discount_percentage' => ( min( array_column( $Sizes, 'price' )) - min( array_column( $Sizes, 'sales_price' )) / 100 . "%" ) ));
        }
        elseif ( $product -> pricing === 'Bundle' )
        {
            $Bundles = Bundle::where( 'product_id', $product -> id ) -> get() -> toArray();
            array_push( $data['price_data'], array( 'price_range' => getValues( $Bundles ), 'price' => "GHS " . number_format ( min( array_column( $Bundles, 'price' )), 2), 'sales_price' => "GHS " . number_format ( min( array_column( $Bundles, 'sales_price' )), 2), 'discount_percentage' => ( min( array_column( $Bundles, 'price' )) - min( array_column( $Bundles, 'sales_price' )) / 100 . "%" ) ));
        }

        return $data;
    }

    /**
     * @param array $data
     * @return string
     */
    function getValues( array $data ) : string
    {
        $values = array_column( $data, 'sales_price' );
        return "GHS " . number_format( min( $values ), 2) . " - " . "GHS " . number_format( max( $values ), 2);
    }

    /**
     * @param string|null $guard
     * @return Factory|Guard|StatefulGuard|Application
     */
    function guard ( string $guard = null )
    {
        return auth( $guard );
    }
