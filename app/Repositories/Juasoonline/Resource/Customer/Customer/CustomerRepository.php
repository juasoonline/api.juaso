<?php

namespace App\Repositories\Juasoonline\Resource\Customer\Customer;

use App\Http\Requests\Business\Resource\Product\Faq\FaqRequest;
use App\Http\Requests\Business\Resource\Product\Review\ReviewRequest;
use App\Jobs\Business\Resource\Product\Review\CreateReview;
use App\Http\Requests\Business\Resource\Store\Review\ReviewRequest as StoreReviewRequest;
use App\Jobs\Business\Resource\Store\Review\CreateReview as StoreCreateReview;
use App\Jobs\Juasoonline\Resource\Customer\Customer\CreateCustomer;
use App\Jobs\Juasoonline\Resource\Customer\Customer\UpdateCustomer;
use App\Http\Requests\Juasoonline\Resource\Customer\Customer\CustomerRequest;
use App\Http\Resources\Juasoonline\Resource\Customer\Customer\CustomerResource;
use App\Http\Resources\Juasoonline\Resource\Customer\Stats\StatsResource;
use App\Models\Business\Resource\Product\Faq\Faq;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use App\Notifications\Juasoonline\Resource\Customer\Customer\RegistrationCodeNotification;
use App\Notifications\Juasoonline\Resource\Customer\Customer\RegistrationCompletedNotification;
use App\Notifications\Juasoonline\Resource\Customer\Customer\ResetPasswordTokenNotification;

use App\Traits\apiResponseBuilder;
use App\Traits\AuthenticatesJwtUsers;
use App\Traits\Relatives;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CustomerRepository implements CustomerRepositoryInterface
{
    use apiResponseBuilder, AuthenticatesJwtUsers, Relatives;

    /**
     * CustomerRepository constructor.
     */
    public function __construct()
    {
        $this -> setGuardName('customer');
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function store( CustomerRequest $customerRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateCustomer( $customerRequest ) ) -> handle(), "Success", "Customer created", Response::HTTP_CREATED );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function registrationCodeVerification( CustomerRequest $customerRequest ) : JsonResponse
    {
        $customer = Customer::where("email", $customerRequest['data']['attributes']['email']) -> where("verification_code", $customerRequest['data']['attributes']['verification_code']) -> first();
        $customer -> update(['verification_code' => null, 'code_expiration_date' => null, 'status' => "000" ]);

        $customer -> notify( new RegistrationCompletedNotification( $customer ) );

        return $this -> successResponse( null, "Success", "Registration successful", Response::HTTP_CREATED );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse |mixed
     */
    public function registrationCodeResend( CustomerRequest $customerRequest ) : JsonResponse
    {
        $customer = Customer::where("email", $customerRequest['data']['attributes']['email']) -> first();
        $customer -> update(['verification_code' => generateRegistrationCode( 6, 'customers' ), 'code_expiration_date' => Carbon::now()->addDays(2) ]);

        $customer -> notify( new RegistrationCodeNotification( $customer ) );

        return $this -> successResponse( null, "Success", "Registration code resent", Response::HTTP_CREATED );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse |mixed
     */
    public function passwordResetVerification( CustomerRequest $customerRequest ) : JsonResponse
    {
        $customer = Customer::where("email", $customerRequest['data']['attributes']['email']) -> first();
        $customer -> update(['password_reset_token' => generateResetPasswordCode( 6 ), 'password_reset_expiration' => Carbon::now()->addHours(24) ]);

        $customer -> notify( new ResetPasswordTokenNotification( $customer ) );

        return $this -> successResponse( null, "Success", "Email verified, password reset code sent.", Response::HTTP_OK );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function passwordResetCodeVerification( CustomerRequest $customerRequest ) : JsonResponse
    {
        try
        {
            Customer::where("email", $customerRequest['data']['attributes']['email']) -> where("password_reset_token", $customerRequest['data']['attributes']['verification_code']) -> first();
            return $this -> successResponse( null, "Success", "Code verification successful", Response::HTTP_OK );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }

    }

    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function resetPassword( CustomerRequest $customerRequest ) : JsonResponse
    {
        $customer = Customer::where("email", $customerRequest['data']['attributes']['email']) -> first();
        $customer -> update(['password' => bcrypt( $customerRequest['data']['attributes']['password'] ), 'password_reset_token' => null, 'password_reset_expiration' => null]);

        return $this -> successResponse( null, "Success", "Password changed", Response::HTTP_OK );
    }








    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse |mixed
     */
    public function changePassword( CustomerRequest $customerRequest ) : JsonResponse
    {
        $customer = Customer::where("email", $customerRequest['data']['attributes']['email']) -> first();
        $customer -> update(['password' => bcrypt( $customerRequest['data']['attributes']['password'] )]);

        return $this -> successResponse( null, "Success", "Password changed", Response::HTTP_CREATED );
    }

    /**
     * @param Customer $customer
     * @return JsonResponse|mixed
     */
    public function show( Customer $customer ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $customer -> load( $this -> relationships ); }
        return $this -> successResponse( new CustomerResource( $customer ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param CustomerRequest $customerRequest
     * @param Customer $customer
     * @return JsonResponse
     */
    public function update( CustomerRequest $customerRequest, Customer $customer ) : JsonResponse
    {
        return $this -> successResponse( ( new UpdateCustomer( $customerRequest, $customer ) ) -> handle(), 'Success', 'Customer updated', Response::HTTP_OK );
    }

    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function getStats( Customer $customer ) : JsonResponse
    {
        return $this -> successResponse( new StatsResource( $customer ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Customer $customer
     * @param Product $product
     * @param ReviewRequest $reviewRequest
     * @return JsonResponse
     */
    public function createProductReview( Customer $customer, Product $product, ReviewRequest $reviewRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateReview( $customer, $product, $reviewRequest ) ) -> handle(), "Success", "Product Review created", Response::HTTP_CREATED );
    }

    /**
     * @param Customer $customer
     * @param Product $product
     * @param FaqRequest $faqRequest
     * @return JsonResponse|mixed
     */
    public function createProductFaq( Customer $customer, Product $product, FaqRequest $faqRequest ) : JsonResponse
    {
        try
        {
            $Faq = new Faq( $faqRequest -> input( 'data.attributes' ) );
            $Faq -> customer() -> associate( $customer -> id );
            $Faq -> product() -> associate( $product -> id );
            $Faq -> save();

            $Faq -> refresh();
            return $this -> successResponse( null, "Success", "Question created", Response::HTTP_CREATED );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }

    /**
     * @param Customer $customer
     * @param Store $store
     * @param StoreReviewRequest $storeReviewRequest
     * @return JsonResponse
     */
    public function createStoreReview( Customer $customer, Store $store, StoreReviewRequest $storeReviewRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new StoreCreateReview( $customer, $store, $storeReviewRequest ) ) -> handle(), "Success", "Product Review created", Response::HTTP_CREATED );
    }
}
