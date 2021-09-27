<?php

namespace App\Jobs\Business\Resource\Product\Color;

use App\Http\Requests\Business\Resource\Product\Color\ColorRequest;
use App\Http\Resources\Business\Resource\Product\Color\ColorResource;
use App\Models\Business\Resource\Product\Color\Color;
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

class CreateColor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theProduct, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Product $product, ColorRequest $colorRequest  )
    {
        $this -> theProduct = $product;
        $this -> theRequest = $colorRequest;
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
            foreach ( $this -> theRequest [ 'data.colors.data' ] as $color )
            {
                $Color = new Color( $color );
                $Color -> product() -> associate( $this -> theProduct -> id );
                $Color -> save();
            }
            return ColorResource::collection( $this -> theProduct -> colors() -> get() );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
