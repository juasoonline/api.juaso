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

class UpdateGroup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private GroupRequest $theRequest; private Group $theModel;

    /**
     * UpdateGroup constructor.
     * @param GroupRequest $groupRequest
     * @param Group $group
     */
    public function __construct( GroupRequest $groupRequest, Group $group )
    {
        $this -> theRequest     = $groupRequest;
        $this -> theModel       = $group;
    }

    /**
     * @return GroupResource|void
     */
    public function handle()
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new GroupResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
