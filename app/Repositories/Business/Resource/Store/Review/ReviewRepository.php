<?php

namespace App\Repositories\Business\Resource\Store\Review;

use App\Http\Requests\Business\Resource\Store\Review\ReviewRequest;
use App\Http\Resources\Business\Resource\Store\Review\ReviewResource;
use App\Http\Resources\Business\Resource\Store\Review\ReviewStatsResource;
use App\Jobs\Business\Resource\Store\Review\UpdateReview;
use App\Models\Business\Resource\Store\Review\Review;
use App\Models\Business\Resource\Store\Store\Store;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReviewRepository implements ReviewRepositoryInterface
{
    use apiResponseBuilder; use Relatives;

    /**
     * Display a listing of the resource.
     *
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse
    {
        $Review = Review::query() -> when( $this -> loadRelationships(), function (Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> paginate( 20 );
        return $this -> successResponse( ReviewResource::collection( $Review ), "Success", null, Response::HTTP_OK );
    }

    /**
     * Display the specified resource.
     *
     * @param Store $store
     * @param Review $review
     * @return JsonResponse
     */
    public function show(Store $store, Review $review ) : JsonResponse
    {
        checkResourceRelation( $store -> reviews() -> where( 'store_reviews.id', $review -> id ) -> count());
        if ( $this -> loadRelationships() ) { $review -> load( $this -> relationships ); }
        return $this -> successResponse( new ReviewResource( $review ), "Success", null, Response::HTTP_OK );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @param ReviewRequest $reviewRequest
     * @param Review $review
     * @return JsonResponse
     */
    public function update(Store $store, ReviewRequest $reviewRequest, Review $review ) : JsonResponse
    {
        checkResourceRelation( $store -> reviews() -> where( 'store_reviews.id', $review -> id ) -> count());
        if ( $this -> loadRelationships() ) { $review -> load( $this -> relationships ); }
        return $this -> successResponse( ( new UpdateReview( $reviewRequest, $review ) ) -> handle(), 'Success', 'Review updated', Response::HTTP_OK );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @return JsonResponse
     */
    public function getStats( Store $store ) : JsonResponse
    {
        $review = getStoreReview( $store );
        return $this -> successResponse( new ReviewStatsResource( $review ), 'Success', null, Response::HTTP_OK );
    }
}
