<?php

namespace App\Http\Controllers\Juaso\Resource\Tag;

use App\Http\Requests\Juaso\Resource\Tag\TagRequest;
use App\Models\Juaso\Resource\Tag\Tag;
use App\Repositories\Juaso\Resource\Tag\TagRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class TagController extends Controller
{
    private $theRepository;

    /**
     * TagController constructor.
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct( TagRepositoryInterface $tagRepository )
    {
        $this -> theRepository = $tagRepository;
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
     * Store a newly created resource in storage.
     *
     * @param TagRequest $tagRequest
     * @return JsonResponse
     */
    public function store( TagRequest $tagRequest ) : JsonResponse
    {
        return $this -> theRepository -> store( $tagRequest );
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return JsonResponse
     */
    public function show( Tag $tag ) : JsonResponse
    {
        return $this -> theRepository -> show( $tag );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $tagRequest
     * @param Tag $tag
     * @return JsonResponse
     */
    public function update( TagRequest $tagRequest, Tag $tag ) : JsonResponse
    {
        return $this -> theRepository -> update( $tagRequest, $tag );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return JsonResponse
     */
    public function destroy( Tag $tag ) : JsonResponse
    {
        return $this -> theRepository -> destroy( $tag );
    }
}
