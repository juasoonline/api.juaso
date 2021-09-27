<?php

namespace App\Jobs\Business\Resource\Product\Image;

use App\Http\Requests\Business\Resource\Product\Image\ImageRequest;
use App\Http\Resources\Business\Resource\Product\Image\ImageResource;
use App\Models\Business\Resource\Product\Image\Image;
use App\Models\Business\Resource\Product\Product\Product;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theProduct, $theRequest;

    /**
     * CreateProduct constructor.
     * @param ImageRequest $imageRequest
     * @param Product $product
     */
    public function __construct( Product $product, ImageRequest $imageRequest )
    {
        $this -> theRequest = $imageRequest;
        $this -> theProduct = $product;
    }

    /**
     * Execute the job.
     * @return AnonymousResourceCollection|mixed
     */
    public function handle() : AnonymousResourceCollection
    {
        try
        {
            foreach ( $this -> theRequest [ 'data.images.data' ] as $images )
            {
                $Image = new Image( $images );
                $Image -> product() -> associate( $this -> theProduct -> id );
                $Image -> save();
            }
            return ImageResource::collection( $this -> theProduct -> images() -> get() );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
