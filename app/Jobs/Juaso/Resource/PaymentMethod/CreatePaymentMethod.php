<?php

namespace App\Jobs\Juaso\Resource\PaymentMethod;

use App\Http\Requests\Juaso\Resource\PaymentMethod\PaymentMethodRequest;
use App\Http\Resources\Juaso\Resource\PaymentMethod\PaymentMethodResource;
use App\Models\Juaso\Resource\PaymentMethod\PaymentMethod;

use App\Traits\apiResponseBuilder;
use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class CreatePaymentMethod implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( PaymentMethodRequest $paymentMethodRequest )
    {
        $this -> theRequest = $paymentMethodRequest;
    }

    /**
     * Execute the job.
     *
     * @return PaymentMethodResource|mixed
     */
    public function handle() : PaymentMethodResource
    {
        try
        {
            $PaymentMethod = new PaymentMethod( $this -> theRequest -> input( 'data.attributes' ) );
            $PaymentMethod -> save();

            $PaymentMethod -> refresh();
            return ( new PaymentMethodResource( $PaymentMethod ) );
        }

        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
