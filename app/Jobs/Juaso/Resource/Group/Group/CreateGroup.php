<?php

namespace App\Jobs\Juaso\Resource\Group\Group;

use App\Http\Requests\Juaso\Resource\Group\Group\GroupRequest;
use App\Http\Resources\Juaso\Resource\Group\Group\GroupResource;
use App\Models\Juaso\Resource\Group\Group\Group;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateGroup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest;

    /**
     * CreateGroup constructor.
     * @param GroupRequest $groupRequest
     */
    public function __construct( GroupRequest $groupRequest )
    {
        $this -> theRequest = $groupRequest;
    }

    /**
     * @return GroupResource|void
     */
    public function handle() : GroupResource
    {
        try
        {
            $Group = new Group( $this -> theRequest -> input( 'data.attributes' ) );
            $Group -> save();

            $Group -> refresh();
            return ( new GroupResource( $Group ) );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
