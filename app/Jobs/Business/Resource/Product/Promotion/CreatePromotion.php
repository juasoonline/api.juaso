<?php

namespace App\Jobs\Business\Resource\Product\Promotion;

use App\Http\Requests\Business\Resource\Product\Promotion\PromotionRequest;
use App\Http\Resources\Business\Resource\Product\Promotion\PromotionResource;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Product\Promotion\Promotion;

use App\Models\Juaso\Resource\PromoType\PromoType;
use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;

class CreatePromotion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theProduct, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Product $product, PromotionRequest $promotionRequest )
    {
        $this -> theProduct = $product;
        $this -> theRequest = $promotionRequest;
    }

    /**
     * Execute the job.
     *
     * @return PromotionResource|mixed
     */
    public function handle() : PromotionResource
    {
        try
        {
            $Promotion = new Promotion( $this -> theRequest -> input( 'data.attributes' ) );
            $Promotion -> product() -> associate( $this -> theProduct -> id );
            $Promotion -> promo_type() -> associate( $this -> getPromoTypeId( $this -> theRequest  -> input( 'data.relationships.promo_type.promo_type_id' ) ) );
            $Promotion -> save();

            $Promotion -> refresh();
            return ( new PromotionResource( $Promotion ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }

    private function getPromoTypeId ( $promoTypeId )
    {
        return PromoType::where( 'resource_id', $promoTypeId ) -> first(['id']);
    }
}
