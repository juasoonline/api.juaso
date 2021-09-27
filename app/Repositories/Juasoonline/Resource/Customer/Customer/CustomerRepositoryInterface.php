<?php

namespace App\Repositories\Juasoonline\Resource\Customer\Customer;

use App\Http\Requests\Business\Resource\Product\Faq\FaqRequest;
use App\Http\Requests\Business\Resource\Product\Review\ReviewRequest;
use App\Http\Requests\Business\Resource\Store\Review\ReviewRequest as StoreReviewRequest;
use App\Http\Requests\Juasoonline\Resource\Customer\Customer\CustomerRequest;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use Illuminate\Http\JsonResponse;

interface CustomerRepositoryInterface
{
    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse|mixed
     */
    public function store( CustomerRequest $customerRequest ) : JsonResponse;

    /**
     * @param Customer $customer
     * @return JsonResponse|mixed
     */
    public function show( Customer $customer ): JsonResponse;

    /**
     * @param CustomerRequest $customerRequest
     * @param Customer $customer
     * @return JsonResponse
     */
    public function update( CustomerRequest $customerRequest, Customer $customer ) : JsonResponse;

    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function getStats( Customer $customer ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param Product $product
     * @param ReviewRequest $reviewRequest
     * @return JsonResponse
     */
    public function createProductReview( Customer $customer, Product $product, ReviewRequest $reviewRequest ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param Product $product
     * @param FaqRequest $faqRequest
     * @return JsonResponse
     */
    public function createProductFaq( Customer $customer, Product $product, FaqRequest $faqRequest ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param Store $store
     * @param StoreReviewRequest $storeReviewRequest
     * @return JsonResponse
     */
    public function createStoreReview( Customer $customer, Store $store, StoreReviewRequest $storeReviewRequest ) : JsonResponse;
}
