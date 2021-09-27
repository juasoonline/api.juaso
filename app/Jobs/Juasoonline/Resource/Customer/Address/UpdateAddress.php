<?php

namespace App\Jobs\Juasoonline\Resource\Customer\Address;

use App\Http\Requests\Juasoonline\Resource\Customer\Address\AddressRequest;
use App\Http\Resources\Juasoonline\Resource\Customer\Address\AddressResource;
use App\Models\Juasoonline\Resource\Customer\Address\Address;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateAddress implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( AddressRequest $addressRequest, Address $address )
    {
        $this -> theRequest     = $addressRequest;
        $this -> theModel       = $address;
    }

    /**
     * Execute the job.
     *
     * @return AddressResource|mixed
     */
    public function handle() : AddressResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new AddressResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
