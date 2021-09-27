<?php

namespace App\Jobs\Business\Resource\Product\Specification;

use App\Http\Requests\Business\Resource\Product\Specification\SpecificationRequest;
use App\Http\Resources\Business\Resource\Product\Specification\SpecificationResource;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Product\Specification\Specification;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateSpecification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theProduct, $theRequest;

    /**
     * Create a new job instance.
     * @param SpecificationRequest $specificationRequest
     * @param Product $product
     */
    public function __construct( Product $product, SpecificationRequest $specificationRequest )
    {
        $this -> theProduct = $product;
        $this -> theRequest = $specificationRequest;
    }

    /**
     * Execute the job.
     * @return AnonymousResourceCollection|void
     */
    public function handle() : AnonymousResourceCollection
    {
        try
        {
            foreach ( $this -> theRequest [ 'data.specifications.data' ] as $specification )
            {
                $Specification = new Specification( $specification );
                $Specification -> product() -> associate( $this -> theProduct -> id );
                $Specification -> save();
            }
            return SpecificationResource::collection( $this -> theProduct -> specifications() -> paginate() );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
