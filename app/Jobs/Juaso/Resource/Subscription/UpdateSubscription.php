<?php

namespace App\Jobs\Juaso\Resource\Subscription;

use App\Http\Requests\Juaso\Resource\VendorSubscription\VendorSubscriptionRequest;
use App\Models\Juaso\Resource\Subscription\Subscription;
use App\Http\Resources\Juaso\Resource\Country\CountryResource;
use App\Http\Resources\Juaso\Resource\Subscription\SubscriptionResource;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private VendorSubscriptionRequest $theRequest; private Subscription $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( VendorSubscriptionRequest $vendorSubscriptionRequest, Subscription $vendorSubscription )
    {
        $this -> theRequest     = $vendorSubscriptionRequest;
        $this -> theModel       = $vendorSubscription;
    }

    /**
     * Execute the job.
     *
     * @return SubscriptionResource|mixed
     */
    public function handle() : SubscriptionResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new SubscriptionResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
