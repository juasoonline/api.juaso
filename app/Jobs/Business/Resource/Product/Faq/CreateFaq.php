<?php

namespace App\Jobs\Business\Resource\Product\Faq;

use App\Http\Requests\Business\Resource\Product\Faq\FaqRequest;
use App\Http\Resources\Business\Resource\Product\Faq\FaqResource;
use App\Models\Business\Resource\Product\Faq\Faq;
use App\Models\Business\Resource\Product\Product\Product;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class CreateFaq implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theProduct, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Product $product, FaqRequest $faqRequest )
    {
        $this -> theProduct = $product;
        $this -> theRequest = $faqRequest;
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
            foreach ( $this -> theRequest [ 'data.faqs.data' ] as $faq )
            {
                $Faq = new Faq( $faq );
                $Faq -> product() -> associate( $this -> theProduct -> id );
                $Faq -> save();
            }
            return FaqResource::collection( $this -> theProduct -> faqs() -> paginate() );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
