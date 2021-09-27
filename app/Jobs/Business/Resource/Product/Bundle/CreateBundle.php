<?php

namespace App\Jobs\Business\Resource\Product\Bundle;

use App\Http\Requests\Business\Resource\Product\Bundle\BundleRequest;
use App\Http\Resources\Business\Resource\Product\Bundle\BundleResource;
use App\Models\Business\Resource\Product\Bundle\Bundle;
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

class CreateBundle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theProduct, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Product $product, BundleRequest $bundleRequest )
    {
        $this -> theProduct = $product;
        $this -> theRequest = $bundleRequest;
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
            foreach ( $this -> theRequest [ 'data.bundles.data' ] as $bundle )
            {
                $Bundle = new Bundle( $bundle );
                $Bundle -> product() -> associate( $this -> theProduct -> id );
                $Bundle -> save();
            }
            return BundleResource::collection( $this -> theProduct -> bundles() -> get() );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
