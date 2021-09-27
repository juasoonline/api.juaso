<?php

namespace App\Jobs\Business\Resource\Product\Promotion;

use App\Http\Requests\Business\Resource\Product\Promotion\PromotionRequest;
use App\Http\Resources\Business\Resource\Product\Promotion\PromotionResource;
use App\Models\Business\Resource\Product\Promotion\Promotion;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdatePromotion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( PromotionRequest $promotionRequest, Promotion $promotion )
    {
        $this -> theRequest     = $promotionRequest;
        $this -> theModel       = $promotion;
    }

    /**
     * Execute the job.
     *
     * @return PromotionResource|mixed
     */
    public function handle() : PromotionResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new PromotionResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
