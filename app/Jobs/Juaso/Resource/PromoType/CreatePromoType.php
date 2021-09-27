<?php

namespace App\Jobs\Juaso\Resource\PromoType;

use App\Http\Requests\Juaso\Resource\PromoType\PromoTypeRequest;
use App\Http\Resources\Juaso\Resource\PromoType\PromoTypeResource;
use App\Models\Juaso\Resource\PromoType\PromoType;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class CreatePromoType implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private PromoTypeRequest $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( PromoTypeRequest $promoTypeRequest )
    {
        $this -> theRequest = $promoTypeRequest;
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
            $PromoType = new PromoType( $this -> theRequest -> input( 'data.attributes' ) );
            $PromoType -> save();

            $PromoType -> refresh();
            return ( new PromoTypeResource( $PromoType ) );
        }
        catch ( Exception $exception )
        {
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
