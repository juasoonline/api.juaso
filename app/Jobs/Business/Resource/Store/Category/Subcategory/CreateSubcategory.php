<?php

namespace App\Jobs\Business\Resource\Store\Category\Subcategory;

use App\Http\Requests\Business\Resource\Store\Category\Subcategory\SubcategoryRequest;
use App\Http\Resources\Business\Resource\Store\Category\Subcategory\SubcategoryResource;
use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateSubcategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theStoreCategory, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Category $storeCategory, SubcategoryRequest $storeSubcategoryRequest )
    {
        $this -> theStoreCategory = $storeCategory;
        $this -> theRequest = $storeSubcategoryRequest;
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
            $Subcategory = new Subcategory( $this -> theRequest -> input( 'data.attributes' ) );
            $Subcategory -> category() -> associate( $this -> theStoreCategory -> id );
            $Subcategory -> save();

            $Subcategory -> refresh();
            return ( new SubcategoryResource( $Subcategory ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
