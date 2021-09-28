<?php

namespace App\Http\Controllers\Juasoonline\Juaso\PaymentMethod;

use App\Models\Juaso\Resource\PaymentMethod\PaymentMethod;
use App\Repositories\Juasoonline\Juaso\PaymentMethod\JuasoonlinePaymentMethodRepositoryInterface;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class JuasoonlinePaymentMethodController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlinePaymentMethodController constructor.
     * @param JuasoonlinePaymentMethodRepositoryInterface $juasoonlinePaymentMethodRepository
     */
    public function __construct( JuasoonlinePaymentMethodRepositoryInterface $juasoonlinePaymentMethodRepository )
    {
        $this -> theRepository = $juasoonlinePaymentMethodRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return $this -> theRepository -> index();
    }

    /**
     * Display the specified resource.
     *
     * @param PaymentMethod $paymentMethod
     * @return JsonResponse
     */
    public function show( PaymentMethod $paymentMethod ) : JsonResponse
    {
        return $this -> theRepository -> show( $paymentMethod );
    }
}
