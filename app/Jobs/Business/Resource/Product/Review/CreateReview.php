<?php

namespace App\Jobs\Business\Resource\Product\Review;

use App\Http\Requests\Business\Resource\Product\Review\ReviewRequest;
use App\Http\Resources\Business\Resource\Product\Review\ReviewResource;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Product\Review\Review;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateReview implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theCustomer, $theProduct;

    /**
     * Create a new job instance.
     *
     * @param Customer $customer
     * @param Product $product
     * @param ReviewRequest $reviewRequest
     */
    public function __construct( Customer $customer, Product $product, ReviewRequest $reviewRequest )
    {
        $this -> theCustomer = $customer;
        $this -> theProduct = $product;
        $this -> theRequest = $reviewRequest;
    }

    /**
     * Execute the job.
     *
     * @return ReviewResource|mixed
     */
    public function handle(): ReviewResource
    {
        try
        {
            $Review = new Review( $this -> theRequest -> input( 'data.attributes' ) );
            $Review -> customer() -> associate( $this -> theCustomer -> id );
            $Review -> product() -> associate( $this -> theProduct -> id );
            $Review -> save();

            $Review -> refresh();
            return ( new ReviewResource( $Review ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
