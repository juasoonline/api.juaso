<?php

namespace App\Jobs\Juasoonline\Resource\Customer\Order;

use App\Http\Requests\Juasoonline\Resource\Customer\Order\OrderRequest;
use App\Http\Resources\Juasoonline\Resource\Customer\Order\OrderResource;
use App\Models\Juasoonline\Resource\Customer\Order\Order;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( OrderRequest $orderRequest, Order $order )
    {
        $this -> theRequest     = $orderRequest;
        $this -> theModel       = $order;
    }

    /**
     * Execute the job.
     *
     * @return OrderResource|mixed
     */
    public function handle() : OrderResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> all()[ 'data' ][ 'attributes' ] );
            return new OrderResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
