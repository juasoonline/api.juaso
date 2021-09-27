<?php

namespace App\Jobs\Juasoonline\Resource\Customer\Address;

use App\Http\Requests\Juasoonline\Resource\Customer\Address\AddressRequest;
use App\Http\Resources\Juasoonline\Resource\Customer\Address\AddressResource;
use App\Models\Juasoonline\Resource\Customer\Address\Address;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use App\Traits\apiResponseBuilder;
use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;

class CreateAddress implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theCustomer, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Customer $customer, AddressRequest $addressRequest )
    {
        $this -> theCustomer = $customer;
        $this -> theRequest = $addressRequest;
    }

    /**
     * Execute the job.
     *
     * @return AnonymousResourceCollection|mixed
     */
    public function handle() : AnonymousResourceCollection
    {
        try
        {
            foreach ( $this -> theRequest [ 'data.addresses.data' ] as $address )
            {
                $address = new Address( $address );
                $address -> customer() -> associate( $this -> theCustomer -> id );
                $address -> save();
            }
            return AddressResource::collection( $this -> theCustomer -> addresses() -> paginate() );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
