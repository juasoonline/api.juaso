<?php

namespace App\Jobs\Business\Resource\Store\Branch;

use App\Http\Requests\Business\Resource\Store\Branch\BranchRequest;
use App\Http\Resources\Business\Resource\Store\Branch\BranchResource;
use App\Models\Business\Resource\Store\Branch\Branch;

use App\Models\Business\Resource\Store\Store\Store;
use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateBranch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theStore;

    /**
     * CreateBranch constructor.
     * @param Store $store
     * @param BranchRequest $branchRequest
     */
    public function __construct( Store $store, BranchRequest  $branchRequest )
    {
        $this -> theStore = $store;
        $this -> theRequest = $branchRequest;
    }

    /**
     * @return BranchResource|mixed
     */
    public function handle(): BranchResource
    {
        try
        {
            $Branch = new Branch( $this -> theRequest -> input( 'data.attributes' ) );
            $Branch -> store() -> associate( $this -> theStore -> id );
            $Branch -> save();

            $Branch -> refresh();
            return ( new BranchResource( $Branch ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
