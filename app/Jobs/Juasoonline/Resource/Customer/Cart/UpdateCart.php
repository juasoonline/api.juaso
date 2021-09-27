<?php

namespace App\Jobs\Juasoonline\Resource\Customer\Cart;

use App\Http\Requests\Juasoonline\Resource\Customer\Cart\CartRequest;
use App\Http\Resources\Juasoonline\Resource\Customer\Cart\CartResource;
use App\Models\Juasoonline\Resource\Customer\Cart\Cart;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;

class UpdateCart implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( CartRequest $cartRequest, Cart $cart )
    {
        $this -> theRequest     = $cartRequest;
        $this -> theModel       = $cart;
    }

    /**
     * Execute the job.
     *
     * @return CartResource|mixed
     */
    public function handle() : CartResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new CartResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
