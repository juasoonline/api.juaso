<?php

namespace App\Http\Controllers\Juasoonline\Resource\Customer\Customer;

use App\Http\Requests\Business\Resource\Product\Faq\FaqRequest;
use App\Http\Requests\UserLoginRequest;
use App\Repositories\Juasoonline\Resource\Customer\Customer\CustomerRepositoryInterface;
use App\Http\Requests\Business\Resource\Product\Review\ReviewRequest;
use App\Http\Requests\Business\Resource\Store\Review\ReviewRequest as StoreReviewRequest;
use App\Http\Requests\Juasoonline\Resource\Customer\Customer\CustomerRequest;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    private $theRepository;

    /**
     * CustomerController constructor.
     *
     * @param CustomerRepositoryInterface $customersRepository
     */
    public function __construct( CustomerRepositoryInterface $customersRepository )
    {
        $this -> theRepository = $customersRepository;
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function store( CustomerRequest $customerRequest ) : JsonResponse
    {
        return $this -> theRepository -> store( $customerRequest );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function registrationCodeVerification( CustomerRequest $customerRequest ) : JsonResponse
    {
        return $this -> theRepository -> registrationCodeVerification( $customerRequest );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function registrationCodeResend( CustomerRequest $customerRequest ) : JsonResponse
    {
        return $this -> theRepository -> registrationCodeResend( $customerRequest );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function passwordResetVerification( CustomerRequest $customerRequest ) : JsonResponse
    {
        return $this -> theRepository -> passwordResetVerification( $customerRequest );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function passwordResetCodeVerification( CustomerRequest $customerRequest ) : JsonResponse
    {
        return $this -> theRepository -> passwordResetCodeVerification( $customerRequest );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function resetPassword( CustomerRequest $customerRequest ) : JsonResponse
    {
        return $this -> theRepository -> resetPassword( $customerRequest );
    }

    /**
     * @param UserLoginRequest $userLoginRequest
     * @return JsonResponse|mixed
     */
    public function login( UserLoginRequest $userLoginRequest ) : JsonResponse
    {
        return $this -> theRepository -> login( $userLoginRequest );
    }

    /**
     * @return JsonResponse|mixed
     */
    public function logOut() : JsonResponse
    {
        return $this -> theRepository -> logOut();
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function changePassword( CustomerRequest $customerRequest ) : JsonResponse
    {
        return $this -> theRepository -> changePassword( $customerRequest );
    }

    /**
     * @param Customer $customer
     * @return JsonResponse|mixed
     */
    public function show( Customer $customer ) : JsonResponse
    {
        return $this -> theRepository -> show( $customer );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @param Customer $customer
     * @return JsonResponse
     */
    public function update( CustomerRequest $customerRequest, Customer $customer ) : JsonResponse
    {
        return $this -> theRepository -> update( $customerRequest, $customer );
    }

    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function getStats( Customer $customer ) : JsonResponse
    {
        return $this -> theRepository -> getStats( $customer );
    }

    /**
     * @param Customer $customer
     * @param Product $product
     * @param ReviewRequest $reviewRequest
     * @return JsonResponse
     */
    public function createProductReview( Customer $customer, Product $product, ReviewRequest $reviewRequest ) : JsonResponse
    {
        return $this -> theRepository -> createProductReview( $customer, $product, $reviewRequest );
    }

    /**
     * @param Customer $customer
     * @param Product $product
     * @param FaqRequest $faqRequest
     * @return JsonResponse
     */
    public function createProductFaq( Customer $customer, Product $product, FaqRequest $faqRequest ) : JsonResponse
    {
        return $this -> theRepository -> createProductFaq( $customer, $product, $faqRequest );
    }

    /**
     * @param Customer $customer
     * @param Store $store
     * @param StoreReviewRequest $storeReviewRequest
     * @return JsonResponse
     */
    public function createStoreReview( Customer $customer, Store $store, StoreReviewRequest $storeReviewRequest ) : JsonResponse
    {
        return $this -> theRepository -> createStoreReview( $customer, $store, $storeReviewRequest );
    }
}
