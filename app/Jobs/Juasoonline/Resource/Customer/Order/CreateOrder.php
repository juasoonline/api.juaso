<?php

namespace App\Jobs\Juasoonline\Resource\Customer\Order;

use App\Http\Requests\Juasoonline\Resource\Customer\Order\OrderRequest;
use App\Http\Resources\Juasoonline\Resource\Customer\Order\OrderResource;
use App\Models\Business\Resource\Product\Bundle\Bundle;
use App\Models\Business\Resource\Product\Color\Color;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Product\Size\Size;
use App\Models\Juaso\Resource\DeliveryMethod\DeliveryMethod;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Models\Juasoonline\Resource\Customer\Order\Order;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theCustomer, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Customer $customers, OrderRequest $orderRequest )
    {
        $this -> theCustomer = $customers;
        $this -> theRequest = $orderRequest;
    }

    /**
     * Execute the job.
     *
     * @return OrderResource|mixed
     */
    public function handle() : OrderResource
    {
        try
        {
            $Order = new Order( $this -> theRequest -> input( 'data.attributes' ) );
            $Order -> customer() -> associate( $this -> theCustomer -> id );
            $Order -> product() -> associate( $this -> getProductId($this -> theRequest['data.attributes.product_id']) -> id);
            $Order -> store() -> associate( $this -> getStoreId($this -> theRequest['data.attributes.product_id']) -> id);

            $Order -> delivery_method() -> associate( $this -> getDeliveryMethodId($this -> theRequest['data.attributes.delivery_method_id']) -> id );

            if ( isset( $this -> theRequest['data.attributes.color_id']) && !empty($this -> theRequest['data.attributes.color_id']) ){ $Order -> color() -> associate( $this -> getColorId($this -> theRequest['data.attributes.color_id']) -> id); }
            if ( isset( $this -> theRequest['data.attributes.size_id']) && !empty($this -> theRequest['data.attributes.size_id'])){ $Order -> size() -> associate( $this -> getSizeId($this -> theRequest['data.attributes.size_id']) -> id); }
            if ( isset( $this -> theRequest ['data.attributes.bundle_id']) && !empty($this -> theRequest['data.attributes.bundle_id'])){ $Order -> bundle() -> associate( $this -> getBundleId($this -> theRequest['data.attributes.bundle_id']) -> id); }

            $Order -> save();

            $Order -> refresh();
            return ( new OrderResource( $Order ) );
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
     * @param $product_id
     * @return mixed
     */
    public function getStoreId( $product_id )
    {
        return Product::where('resource_id', $product_id) -> first() -> store () -> first('id');
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

    /**
     * @param $delivery_method_id
     * @return mixed
     */
    public function getDeliveryMethodId( $delivery_method_id )
    {
        return DeliveryMethod::where('resource_id', $delivery_method_id) -> first('id');
    }
}
