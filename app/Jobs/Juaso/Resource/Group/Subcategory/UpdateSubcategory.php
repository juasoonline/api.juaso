<?php

namespace App\Jobs\Juaso\Resource\Group\Subcategory;

use App\Http\Requests\Juaso\Resource\Group\Subcategory\SubcategoryRequest;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\SubcategoryResource;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateSubcategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private SubcategoryRequest $theRequest; private Subcategory $theModel;

    /**
     * UpdateSubcategory constructor.
     * @param SubcategoryRequest $subcategoryRequest
     * @param Subcategory $subcategory
     */
    public function __construct( SubcategoryRequest $subcategoryRequest, Subcategory $subcategory )
    {
        $this -> theRequest     = $subcategoryRequest;
        $this -> theModel       = $subcategory;
    }

    /**
     * @return SubcategoryResource|void
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
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
