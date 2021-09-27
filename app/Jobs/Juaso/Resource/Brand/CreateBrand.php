<?php

namespace App\Jobs\Juaso\Resource\Brand;

use App\Http\Requests\Juaso\Resource\Brand\BrandRequest;
use App\Http\Resources\Juaso\Resource\Brand\BrandResource;
use App\Models\Juaso\Resource\Brand\Brand;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;

class CreateBrand implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private BrandRequest $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( BrandRequest $brandRequest )
    {
        $this -> theRequest = $brandRequest;
    }

    /**
     * Execute the job.
     *
     * @return BrandResource|mixed
     */
    public function handle() : BrandResource
    {
        try
        {
            $Brand = new Brand( $this -> theRequest -> input( 'data.attributes' ) );
            $Brand -> save();

            $Brand -> refresh();
            return ( new BrandResource( $Brand ) );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
