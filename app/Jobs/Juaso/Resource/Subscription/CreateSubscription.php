<?php

namespace App\Jobs\Juaso\Resource\Subscription;

use App\Http\Requests\Juaso\Resource\VendorSubscription\VendorSubscriptionRequest;
use App\Http\Resources\Juaso\Resource\Subscription\SubscriptionResource;
use App\Models\Juaso\Resource\Subscription\Subscription;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class CreateSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private VendorSubscriptionRequest $theRequest;

    /**
     * Create a new job instance.
     *
     * @param VendorSubscriptionRequest $vendorSubscriptionRequest
     */
    public function __construct( VendorSubscriptionRequest $vendorSubscriptionRequest )
    {
        $this -> theRequest = $vendorSubscriptionRequest;
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
            $Subscription = new Subscription( $this -> theRequest -> input( 'data.attributes' ) );
            $Subscription -> save();

            $Subscription -> refresh();
            return ( new SubscriptionResource( $Subscription ) );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
