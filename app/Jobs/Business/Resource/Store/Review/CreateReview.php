<?php

namespace App\Jobs\Business\Resource\Store\Review;

use App\Http\Requests\Business\Resource\Store\Review\ReviewRequest;
use App\Http\Resources\Business\Resource\Store\Review\ReviewResource;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Review\Review;
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
    private $theCustomer, $theStore, $theRequest;

    /**
     * Create a new job instance.
     *
     * @param Customer $customer
     * @param Store $store
     * @param ReviewRequest $storeReviewRequest
     */
    public function __construct( Customer $customer, Store $store, ReviewRequest $storeReviewRequest )
    {
        $this -> theCustomer = $customer;
        $this -> theStore = $store;
        $this -> theRequest = $storeReviewRequest;
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
            $Review -> store() -> associate( $this -> theStore -> id );
            $Review -> customer() -> associate( $this -> theCustomer -> id );
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
