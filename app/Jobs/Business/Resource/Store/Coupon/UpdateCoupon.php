<?php

namespace App\Jobs\Business\Resource\Store\Coupon;

use App\Http\Requests\Business\Resource\Store\Coupon\CouponRequest;
use App\Http\Resources\Business\Resource\Store\Coupon\CouponResource;
use App\Models\Business\Resource\Store\Coupon\Coupon;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class UpdateCoupon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theRequest, $theModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CouponRequest $storeCouponRequest, Coupon $storeCoupon )
    {
        $this -> theRequest     = $storeCouponRequest;
        $this -> theModel       = $storeCoupon;
    }

    /**
     * Execute the job.
     *
     * @return CouponResource|mixed
     */
    public function handle() : CouponResource
    {
        try
        {
            $this -> theModel -> update( $this -> theRequest -> validated()[ 'data' ][ 'attributes' ] );
            return new CouponResource( $this -> theModel );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
