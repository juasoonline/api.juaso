<?php

namespace App\Repositories\Juaso\Resource\Tag;

use App\Http\Requests\Juaso\Resource\Tag\TagRequest;
use App\Http\Resources\Juaso\Resource\Tag\TagResource;
use App\Models\Juaso\Resource\Tag\Tag;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TagRepository implements TagRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $Tag = Tag::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); }) -> get();
        return $this -> successResponse( TagResource::collection( $Tag ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param TagRequest $tagRequest
     * @return JsonResponse
     */
    public function store( TagRequest $tagRequest ) : JsonResponse
    {
        //
    }

    /**
     * @param Tag $tag
     * @return JsonResponse
     */
    public function show( Tag $tag ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $tag -> load( $this -> relationships ); }
        return $this -> successResponse( new TagResource( $tag ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param TagRequest $tagRequest
     * @param Tag $tag
     * @return JsonResponse
     */
    public function update( TagRequest $tagRequest, Tag $tag ) : JsonResponse
    {
        //
    }

    /**
     * @param Tag $tag
     * @return JsonResponse
     */
    public function destroy( Tag $tag ) : JsonResponse
    {
        //
    }
}
