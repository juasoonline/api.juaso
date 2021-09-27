<?php

namespace App\Jobs\Business\Resource\Store\Branch;

use App\Http\Requests\Business\Resource\Store\Branch\BranchRequest;
use App\Http\Resources\Business\Resource\Store\Branch\BranchResource;
use App\Models\Business\Resource\Store\Branch\Branch;

use App\Traits\apiResponseBuilder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateBranch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * UpdateBranch constructor.
     * @param BranchRequest $branchRequest
     * @param Branch $branch
     */
    public function __construct( BranchRequest $branchRequest, Branch $branch )
    {
        $this -> theRequest     = $branchRequest;
        $this -> theModel       = $branch;
    }

    /**
     * @return BranchResource|mixed
     */
    public function handle() : BranchResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new BranchResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
