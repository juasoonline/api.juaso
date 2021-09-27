<?php

namespace App\Jobs\Business\Resource\Product\Overview;

use App\Http\Requests\Business\Resource\Product\Overview\OverviewRequest;
use App\Http\Resources\Business\Resource\Product\Overview\OverviewResource;
use App\Models\Business\Resource\Product\Overview\Overview;
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

class CreateOverview implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theProduct, $theRequest;

    /**
     * Create a new job instance.
     * @param OverviewRequest $overviewRequest
     * @param Product $product
     */
    public function __construct( OverviewRequest $overviewRequest, Product $product )
    {
        $this -> theRequest = $overviewRequest;
        $this -> theProduct = $product;
    }

    /**
     * Execute the job.
     * @return AnonymousResourceCollection|void
     */
    public function handle() : AnonymousResourceCollection
    {
        try
        {
            foreach ( $this -> theRequest [ 'data.overviews.data' ] as $overview )
            {
                $Overview = new Overview( $overview );
                $Overview -> product() -> associate( $this -> theProduct -> id );
                $Overview -> save();
            }
            return OverviewResource::collection( $this -> theProduct -> overviews() -> get() );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
