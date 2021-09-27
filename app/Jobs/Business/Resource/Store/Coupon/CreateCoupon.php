<?php

namespace App\Jobs\Business\Resource\Store\Coupon;

use App\Http\Requests\Business\Resource\Store\Coupon\CouponRequest;
use App\Http\Resources\Business\Resource\Store\Coupon\CouponResource;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Coupon\Coupon;
use App\Models\Business\Resource\Store\Review\Review;

use App\Traits\apiResponseBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CreateCoupon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, apiResponseBuilder;
    private $theStore, $theRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Store $store, CouponRequest $storeCouponRequest )
    {
        $this -> theStore = $store;
        $this -> theRequest = $storeCouponRequest;
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
            $Coupon = new Coupon( $this -> theRequest -> input( 'data.attributes' ) );
            $Coupon -> store() -> associate( $this -> theStore -> id );
            $Coupon -> save();

            $Coupon -> refresh();
            return ( new CouponResource( $Coupon ) );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
