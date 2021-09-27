<?php

namespace App\Jobs\Juaso\Resource\PromoType;

use App\Http\Requests\Juaso\Resource\PromoType\PromoTypeRequest;
use App\Http\Resources\Juaso\Resource\PromoType\PromoTypeResource;
use App\Models\Juaso\Resource\PromoType\PromoType;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdatePromoType implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private PromoTypeRequest $theRequest; private PromoType $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( PromoTypeRequest $promoTypeRequest, PromoType $promoType )
    {
        $this -> theRequest     = $promoTypeRequest;
        $this -> theModel       = $promoType;
    }

    /**
     * Execute the job.
     *
     * @return PromoTypeResource|mixed
     */
    public function handle() : PromoTypeResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new PromoTypeResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
