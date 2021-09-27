<?php

namespace App\Jobs\Business\Resource\Product\Faq;

use App\Http\Requests\Business\Resource\Product\Faq\FaqRequest;
use App\Http\Resources\Business\Resource\Product\Faq\FaqResource;
use App\Models\Business\Resource\Product\Faq\Faq;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class UpdateFaq implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( FaqRequest $faqRequest, Faq $faq )
    {
        $this -> theRequest = $faqRequest;
        $this -> theModel = $faq;
    }

    /**
     * Execute the job.
     *
     * @return FaqResource|mixed
     */
    public function handle() : FaqResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new FaqResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
