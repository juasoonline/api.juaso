<?php

namespace App\Jobs\Business\Resource\Store\Review;

use App\Http\Requests\Business\Resource\Store\Review\ReviewRequest;
use App\Http\Resources\Business\Resource\Store\Review\ReviewResource;
use App\Models\Business\Resource\Store\Review\Review;

use App\Traits\apiResponseBuilder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateReview implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * UpdateReview constructor.
     * @param ReviewRequest $storeReviewRequest
     * @param Review $storeReview
     */
    public function __construct(ReviewRequest $storeReviewRequest, Review $storeReview )
    {
        $this -> theRequest     = $storeReviewRequest;
        $this -> theModel       = $storeReview;
    }

    /**
     * @return ReviewResource|mixed
     */
    public function handle() : ReviewResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new ReviewResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
