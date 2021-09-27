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

class UpdateStore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * UpdateStore constructor.
     * @param StoreRequest $storeRequest
     * @param Store $store
     */
    public function __construct( StoreRequest $storeRequest, Store $store )
    {
        $this -> theRequest     = $storeRequest;
        $this -> theModel       = $store;
    }

    /**
     * @return StoreResource|void
     */
    public function handle(): StoreResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new StoreResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
