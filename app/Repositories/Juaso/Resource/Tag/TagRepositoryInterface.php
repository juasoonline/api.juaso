<?php

namespace App\Repositories\Juaso\Resource\Tag;

use App\Http\Requests\Juaso\Resource\Tag\TagRequest;
use App\Models\Juaso\Resource\Tag\Tag;

use Illuminate\Http\JsonResponse;

interface TagRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse;

    /**
     * @param TagRequest $tagRequest
     * @return JsonResponse
     */
    public function store( TagRequest $tagRequest ) : JsonResponse;

    /**
     * @param Tag $tag
     * @return JsonResponse
     */
    public function show( Tag $tag ) : JsonResponse;

    /**
     * @param TagRequest $tagRequest
     * @param Tag $tag
     * @return JsonResponse
     */
    public function update( TagRequest $tagRequest, Tag $tag ) : JsonResponse;

    /**
     * @param Tag $tag
     * @return JsonResponse
     */
    public function destroy( Tag $tag ) : JsonResponse;
}
