<?php

namespace App\Jobs\Business\Resource\Store\Category\Category;

use App\Http\Requests\Business\Resource\Store\Category\Category\CategoryRequest;
use App\Http\Resources\Business\Resource\Store\Category\Category\CategoryResource;
use App\Models\Business\Resource\Store\Category\Category\Category;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateCategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( CategoryRequest $productCategoryRequest, Category $productCategory )
    {
        $this -> theRequest     = $productCategoryRequest;
        $this -> theModel       = $productCategory;
    }

    /**
     * Execute the job.
     *
     * @return CategoryResource|mixed
     */
    public function handle() : CategoryResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new CategoryResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
