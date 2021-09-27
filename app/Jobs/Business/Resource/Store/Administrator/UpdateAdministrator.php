<?php

namespace App\Jobs\Business\Resource\Store\Administrator;

use App\Http\Requests\Business\Resource\Store\Administrator\AdministratorRequest;
use App\Http\Resources\Business\Resource\Store\Administrator\AdministratorResource;
use App\Models\Business\Resource\Store\Administrator\Administrator;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateAdministrator implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @param AdministratorRequest $storeAdministratorRequest
     * @param Administrator $storeAdministrator
     */
    public function __construct(AdministratorRequest $storeAdministratorRequest, Administrator $storeAdministrator )
    {
        $this -> theRequest     = $storeAdministratorRequest;
        $this -> theModel       = $storeAdministrator;
    }

    /**
     * Execute the job.
     *
     * @return JsonResource|void
     */
    public function handle()
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new AdministratorResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
