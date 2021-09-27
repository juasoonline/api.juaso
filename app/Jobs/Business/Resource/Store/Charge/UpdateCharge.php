<?php

namespace App\Jobs\Business\Resource\Store\Charge;

use App\Http\Requests\Business\Resource\Store\Charge\ChargeRequest;
use App\Http\Resources\Business\Resource\Store\Charge\ChargeResource;
use App\Models\Business\Resource\Store\Charge\Charge;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateCharge implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( ChargeRequest $chargeRequest, Charge $charge )
    {
        $this -> theRequest     = $chargeRequest;
        $this -> theModel       = $charge;
    }

    /**
     * Execute the job.
     *
     * @return ChargeResource|mixed
     */
    public function handle() : ChargeResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new ChargeResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
