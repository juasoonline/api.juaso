<?php

namespace App\Jobs\Juaso\Resource\Group\Subcategory;

use App\Http\Requests\Juaso\Resource\Group\Subcategory\SubcategoryRequest;
use App\Http\Resources\Juaso\Resource\Group\Subcategory\SubcategoryResource;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;

use App\Traits\apiResponseBuilder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class CreateSubcategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private SubcategoryRequest $theRequest;

    /**
     * CreateSubcategory constructor.
     * @param SubcategoryRequest $subcategoryRequest
     */
    public function __construct( SubcategoryRequest $subcategoryRequest )
    {
        $this -> theRequest = $subcategoryRequest;
    }

    /**
     * @return SubcategoryResource|void
     */
    public function handle()
    {
        try
        {
            $Subcategory = new Subcategory( $this -> theRequest -> input( 'data.attributes' ) );
            $Subcategory -> category() -> associate( $this -> theRequest [ 'data.relationships.category.category_id' ] );
            $Subcategory -> save();

            $Subcategory -> refresh();
            return ( new SubcategoryResource( $Subcategory ) );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
