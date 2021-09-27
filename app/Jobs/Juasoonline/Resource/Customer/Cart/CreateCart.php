<?php

namespace App\Jobs\Juasoonline\Resource\Customer\Cart;

use App\Http\Requests\Juasoonline\Resource\Customer\Cart\CartRequest;
use App\Http\Resources\Juasoonline\Resource\Customer\Cart\CartResource;
use App\Models\Business\Resource\Product\Bundle\Bundle;
use App\Models\Business\Resource\Product\Color\Color;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Product\Size\Size;
use App\Models\Juasoonline\Resource\Customer\Cart\Cart;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateCart implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theCustomer, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Customer $customers, CartRequest $cartRequest )
    {
        $this -> theCustomer = $customers;
        $this -> theRequest = $cartRequest;
    }

    /**
     * Execute the job.
     *
     * @return CartResource|mixed
     */
    public function handle() : CartResource
    {
        try
        {
            $Cart = new Cart( $this -> theRequest -> input( 'data.attributes' ) );
            $Cart -> customer() -> associate( $this -> theCustomer -> id );
            $Cart -> product() -> associate( $this -> getProductId($this -> theRequest['data.attributes.product_id']) -> id);

            if ( isset( $this -> theRequest['data.attributes.color_id']) && !empty($this -> theRequest['data.attributes.color_id']) ){ $Cart -> color() -> associate( $this -> getColorId($this -> theRequest['data.attributes.color_id']) -> id); }
            if ( isset( $this -> theRequest['data.attributes.size_id']) && !empty($this -> theRequest['data.attributes.size_id'])){ $Cart -> size() -> associate( $this -> getSizeId($this -> theRequest['data.attributes.size_id']) -> id); }
            if ( isset( $this -> theRequest ['data.attributes.bundle_id']) && !empty($this -> theRequest['data.attributes.bundle_id'])){ $Cart -> bundle() -> associate( $this -> getBundleId($this -> theRequest['data.attributes.bundle_id']) -> id); }

            $Cart -> save();

            $Cart -> refresh();
            return ( new CartResource( $Cart ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }

    /**
     * @param $product_id
     * @return mixed
     */
    public function getProductId( $product_id )
    {
        return Product::where('resource_id', $product_id) -> first('id');
    }

    /**
     * @param $color_id
     * @return mixed
     */
    public function getColorId( $color_id )
    {
        return Color::where('resource_id', $color_id) -> first('id');
    }

    /**
     * @param $size_id
     * @return mixed
     */
    public function getSizeId( $size_id )
    {
        return Size::where('resource_id', $size_id) -> first('id');
    }

    /**
     * @param $bundle_id
     * @return mixed
     */
    public function getBundleId( $bundle_id )
    {
        return Bundle::where('resource_id', $bundle_id) -> first('id');
    }
}
