<?php
    use App\Models\Business\Resource\Product\Product\Product;
    use App\Models\Business\Resource\Product\Color\Color;
    use App\Models\Business\Resource\Product\Size\Size;
    use App\Models\Business\Resource\Product\Bundle\Bundle;

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
     * @param $table
     * @return string
     */
    function generateVerificationCode( int $length, $table ) : string
    {
        $number = '';

        do {
            for ( $i = $length; $i --; $i > 0 )
            {
                $number .= mt_rand(0,9);
            }
        } while ( !empty( DB::table( $table ) -> where( 'verification_code', $number ) -> first([ 'verification_code' ])) );

        return $number;
    }

    /**
     * Generate unique ID
     * @return string
     */
    function generateToken() : string
    {
        $key = config('app.key');

        if ( Str::startsWith( $key, 'base64:' ))
        {
            $key = base64_decode(substr($key, 7));
        }
        return hash_hmac('sha256', Str::random(40), $key);
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
            array_push( $data['price_data'], array( 'price_range' => getValues( $Colors )));
        }
        elseif ( $product -> pricing === 'Size' )
        {
            $Sizes = Size::where( 'product_id', $product -> id ) -> get() -> toArray();
            array_push( $data['price_data'], array( 'price_range' => getValues( $Sizes )));
        }
        elseif ( $product -> pricing === 'Bundle' )
        {
            $Bundles = Bundle::where( 'product_id', $product -> id ) -> get() -> toArray();
            array_push( $data['price_data'], array( 'price_range' => getValues( $Bundles )));
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
