<?php

namespace App\Jobs\Business\Resource\Store\Category\Category;

use App\Http\Requests\Business\Resource\Store\Category\Category\CategoryRequest;
use App\Http\Resources\Business\Resource\Store\Category\Category\CategoryResource;
use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Store\Store\Store;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateCategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theModel, $theRequest;

    /**
     * CreateCategory constructor.
     * @param Store $store
     * @param CategoryRequest $productCategoryRequest
     */
    public function __construct( Store $store, CategoryRequest $productCategoryRequest )
    {
        $this -> theModel = $store;
        $this -> theRequest = $productCategoryRequest;
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
            $Category = new Category( $this -> theRequest -> input( 'data.attributes' ) );
            $Category -> store() -> associate( $this -> theModel -> id );
            $Category -> save();

            $Category -> refresh();
            return ( new CategoryResource( $Category ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
