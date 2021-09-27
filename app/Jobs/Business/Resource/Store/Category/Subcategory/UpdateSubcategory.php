<?php

namespace App\Jobs\Business\Resource\Store\Category\Subcategory;

use App\Http\Requests\Business\Resource\Store\Category\Subcategory\SubcategoryRequest;
use App\Http\Resources\Business\Resource\Store\Category\Subcategory\SubcategoryResource;
use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateSubcategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( SubcategoryRequest $productSubcategoryRequest, Subcategory $productSubcategory )
    {
        $this -> theRequest = $productSubcategoryRequest;
        $this -> theModel = $productSubcategory;
    }

    /**
     * Execute the job.
     *
     * @return SubcategoryResource|mixed
     */
    public function handle() : SubcategoryResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new SubcategoryResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
