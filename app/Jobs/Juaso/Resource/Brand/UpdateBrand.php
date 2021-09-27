<?php

namespace App\Jobs\Juaso\Resource\Brand;

use App\Http\Requests\Juaso\Resource\Brand\BrandRequest;
use App\Http\Resources\Juaso\Resource\Brand\BrandResource;
use App\Models\Juaso\Resource\Brand\Brand;

use App\Traits\apiResponseBuilder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateBrand implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private BrandRequest $theRequest; private Brand $theModel;

    /**
     * UpdateBrand constructor.
     * @param BrandRequest $brandRequest
     * @param Brand $brand
     */
    public function __construct( BrandRequest $brandRequest, Brand $brand )
    {
        $this -> theRequest     = $brandRequest;
        $this -> theModel       = $brand;
    }

    /**
     * @return BrandResource|void
     */
    public function handle()
    {
        logger($this->theRequest);
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new BrandResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
