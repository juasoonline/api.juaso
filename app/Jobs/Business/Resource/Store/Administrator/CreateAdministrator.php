<?php

namespace App\Jobs\Business\Resource\Store\Administrator;

use App\Http\Requests\Business\Resource\Store\Administrator\AdministratorRequest;
use App\Http\Resources\Business\Resource\Store\Administrator\AdministratorResource;
use App\Models\Business\Resource\Store\Administrator\Administrator;

use App\Models\Business\Resource\Store\Store\Store;
use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateAdministrator implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theModel, $theRequest;

    /**
     * Create a new job instance.
     *
     * @param Store $store
     * @param AdministratorRequest $storeAdministratorRequest
     */
    public function __construct( Store $store, AdministratorRequest $storeAdministratorRequest )
    {
        $this -> theModel = $store;
        $this -> theRequest = $storeAdministratorRequest;
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
            $storeAdministrator = new Administrator( $this -> theRequest -> input( 'data.attributes' ) );
            $storeAdministrator -> store() -> associate( $this -> theModel -> id );
            $storeAdministrator -> save();

            $storeAdministrator -> refresh();
            return ( new AdministratorResource( $storeAdministrator ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
