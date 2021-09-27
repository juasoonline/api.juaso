<?php

namespace App\Jobs\Juasoonline\Resource\Customer\Wishlist;

use App\Http\Requests\Juasoonline\Resource\Customer\Wishlist\WishlistRequest;
use App\Http\Resources\Business\Resource\Product\Product\ProductResource;
use App\Http\Resources\Juasoonline\Resource\Customer\Wishlist\WishlistResource;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Models\Juasoonline\Resource\Customer\Wishlist\Wishlist;

use App\Traits\apiResponseBuilder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateWishlist implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theCustomer, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Customer $customers, WishlistRequest $wishlistRequest )
    {
        $this -> theCustomer = $customers;
        $this -> theRequest = $wishlistRequest;
    }

    /**
     * Execute the job.
     *
     * @return WishlistResource|mixed
     */
    public function handle() : WishlistResource
    {
        try
        {
            $Wishlist = new Wishlist();
            $Wishlist -> customer() -> associate( $this -> theCustomer -> id );
            $Wishlist -> product() -> associate( $this -> getProductId( $this -> theRequest ['data.attributes.product_id']) -> id);

            $Wishlist -> save();

            $Wishlist -> refresh();
            return ( new WishlistResource( $Wishlist ) );
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
        return Product::where('resource_id', $product_id) -> first( 'id' );
    }
}
