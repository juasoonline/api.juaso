<?php

namespace App\Repositories\Business\Resource\Store\Review;

use App\Http\Requests\Business\Resource\Store\Review\ReviewRequest;
use App\Models\Business\Resource\Store\Review\Review;
use App\Models\Business\Resource\Store\Store\Store;
use Illuminate\Http\JsonResponse;

interface ReviewRepositoryInterface
{
    /**
     * Display a listing of the resource.
     *
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse;

    /**
     * Display the specified resource.
     *
     * @param Store $store
     * @param Review $review
     * @return JsonResponse
     */
    public function show(Store $store, Review $review ) : JsonResponse;

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @param ReviewRequest $reviewRequest
     * @param Review $review
     * @return JsonResponse
     */
    public function update(Store $store, ReviewRequest $reviewRequest, Review $review ) : JsonResponse;

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @return JsonResponse
     */
    public function getStats( Store $store ) : JsonResponse;
}
