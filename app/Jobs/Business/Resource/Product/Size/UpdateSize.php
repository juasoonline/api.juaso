<?php

namespace App\Jobs\Business\Resource\Product\Size;

use App\Http\Requests\Business\Resource\Product\Size\SizeRequest;
use App\Http\Resources\Business\Resource\Product\Size\SizeResource;
use App\Models\Business\Resource\Product\Size\Size;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateSize implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( SizeRequest $sizeRequest, Size $size )
    {
        $this -> theRequest     = $sizeRequest;
        $this -> theModel       = $size;
    }

    /**
     * Execute the job.
     *
     * @return SizeResource|mixed
     */
    public function handle() : SizeResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new SizeResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
