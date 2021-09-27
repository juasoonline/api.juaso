<?php

namespace App\Jobs\Business\Resource\Store\Store;

use App\Http\Requests\Business\Resource\Store\Store\StoreRequest;
use App\Http\Resources\Business\Resource\Store\Store\StoreResource;
use App\Models\Business\Resource\Store\Store\Store;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class CreateStore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest;

    /**
     * CreateStore constructor.
     * @param StoreRequest $storeRequest
     */
    public function __construct( StoreRequest $storeRequest )
    {
        $this -> theRequest = $storeRequest;
    }

    /**
     * @return StoreResource|void
     */
    public function handle(): StoreResource
    {
        try
        {
            $Store = new Store( $this -> theRequest -> input( 'data.attributes' ) );
            $Store -> country() -> associate( $this -> theRequest [ 'data.relationships.country.country_id' ] );
            $Store -> subscription() -> associate( $this -> theRequest [ 'data.relationships.subscription.subscription_id' ] );
            $Store -> save();

            $Store -> refresh();
            return ( new StoreResource( $Store ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
