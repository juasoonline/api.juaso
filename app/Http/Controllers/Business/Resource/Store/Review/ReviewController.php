<?php

namespace App\Http\Controllers\Business\Resource\Store\Review;

use App\Repositories\Business\Resource\Store\Review\ReviewRepositoryInterface;
use App\Http\Requests\Business\Resource\Store\Review\ReviewRequest;
use App\Models\Business\Resource\Store\Review\Review;
use App\Models\Business\Resource\Store\Store\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    private $theRepository;

    /**
     * ReviewController constructor.
     * @param ReviewRepositoryInterface $reviewRepository
     */
    public function __construct( ReviewRepositoryInterface $reviewRepository )
    {
        $this -> theRepository = $reviewRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> index( $store );
    }

    /**
     * Display the specified resource.
     *
     * @param Store $store
     * @param Review $review
     * @return JsonResponse
     */
    public function show( Store $store, Review $review ) : JsonResponse
    {
        return $this -> theRepository -> show( $store, $review );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @param ReviewRequest $reviewRequest
     * @param Review $review
     * @return JsonResponse
     */
    public function update( Store $store, ReviewRequest $reviewRequest, Review $review ) : JsonResponse
    {
        return $this -> theRepository -> update( $store, $reviewRequest, $review );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @return JsonResponse
     */
    public function getStats( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> getStats( $store );
    }
}
