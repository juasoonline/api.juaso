<?php

namespace App\Jobs\Business\Resource\Product\Size;

use App\Http\Requests\Business\Resource\Product\Size\SizeRequest;
use App\Http\Resources\Business\Resource\Product\Size\SizeResource;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Product\Size\Size;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateSize implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theProduct, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Product $product, SizeRequest $sizeRequest )
    {
        $this -> theProduct = $product;
        $this -> theRequest = $sizeRequest;
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
            foreach ( $this -> theRequest [ 'data.sizes.data' ] as $size )
            {
                $size = new Size( $size );
                $size -> product() -> associate( $this -> theProduct -> id );
                $size -> save();
            }
            return SizeResource::collection( $this -> theProduct -> sizes() -> get() );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
