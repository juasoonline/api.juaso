<?php

namespace App\Jobs\Juaso\Resource\Group\Category;

use App\Http\Requests\Juaso\Resource\Group\Category\CategoryRequest;
use App\Http\Resources\Juaso\Resource\Group\Category\CategoryResource;
use App\Models\Juaso\Resource\Group\Category\Category;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class CreateCategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private CategoryRequest $theRequest;

    /**
     * CreateCategory constructor.
     * @param CategoryRequest $categoryRequest
     */
    public function __construct( CategoryRequest $categoryRequest )
    {
        $this -> theRequest = $categoryRequest;
    }

    /**
     * @return CategoryResource|void
     */
    public function handle() : CategoryResource
    {
        try
        {
            $Category = new Category( $this -> theRequest -> input( 'data.attributes' ) );
            $Category -> group() -> associate( $this -> theRequest [ 'data.relationships.group.group_id' ] );
            $Category -> save();

            $Category -> refresh();
            return ( new CategoryResource( $Category ) );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
