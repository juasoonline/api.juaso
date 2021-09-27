<?php

namespace App\Jobs\Business\Resource\Product\Specification;

use App\Http\Requests\Business\Resource\Product\Specification\SpecificationRequest;
use App\Http\Resources\Business\Resource\Product\Specification\SpecificationResource;
use App\Models\Business\Resource\Product\Specification\Specification;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateSpecification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @param SpecificationRequest $specificationRequest
     * @param Specification $specification
     */
    public function __construct( SpecificationRequest $specificationRequest, Specification $specification )
    {
        $this -> theRequest     = $specificationRequest;
        $this -> theModel       = $specification;
    }

    /**
     * Execute the job.
     *
     * @return SpecificationResource|mixed
     */
    public function handle() : SpecificationResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new SpecificationResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
