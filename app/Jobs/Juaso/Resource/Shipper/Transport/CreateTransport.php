<?php

namespace App\Jobs\Juaso\Resource\Shipper\Transport;

use App\Http\Requests\Juaso\Resource\Shipper\Transport\TransportRequest;
use App\Http\Resources\Juaso\Resource\Shipper\Transport\TransportResource;
use App\Models\Juaso\Resource\Shipper\Shipper\Shipper;
use App\Models\Juaso\Resource\Shipper\Transport\Transport;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateTransport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private Shipper $theModel; private TransportRequest $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Shipper $shipper , TransportRequest $transportRequest )
    {
        $this -> theModel = $shipper;
        $this -> theRequest = $transportRequest;
    }

    /**
     * Execute the job.
     *
     * @return TransportResource|mixed
     */
    public function handle() : TransportResource
    {
        try
        {
            $Transport = new Transport( $this -> theRequest -> input( 'data.attributes' ) );
            $Transport -> shipper() -> associate( $this -> theModel -> id );
            $Transport -> save();

            $Transport -> refresh();
            return ( new TransportResource( $Transport ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
