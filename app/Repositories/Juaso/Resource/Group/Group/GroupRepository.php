<?php

namespace App\Repositories\Juaso\Resource\Group\Group;

use App\Http\Requests\Juaso\Resource\Group\Group\GroupRequest;
use App\Http\Resources\Juaso\Resource\Group\Group\GroupResource;
use App\Jobs\Juaso\Resource\Group\Group\CreateGroup;
use App\Jobs\Juaso\Resource\Group\Group\UpdateGroup;
use App\Models\Juaso\Resource\Group\Group\Group;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class GroupRepository implements GroupRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse|mixed
     */
    public function index() : JsonResponse
    {
        $Group = Group::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( GroupResource::collection( $Group ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param GroupRequest $groupRequest
     * @return JsonResponse|mixed
     */
    public function store( GroupRequest $groupRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateGroup( $groupRequest ) ) -> handle(), "Success", "Group created", Response::HTTP_CREATED );
    }

    /**
     * @param Group $group
     * @return JsonResponse|mixed
     */
    public function show( Group $group ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $group -> load( $this -> relationships ); }
        return $this -> successResponse( new GroupResource( $group ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param GroupRequest $groupRequest
     * @param Group $group
     * @return JsonResponse|mixed
     */
    public function update( GroupRequest $groupRequest, Group $group ) : JsonResponse
    {
        return $this -> successResponse( ( new UpdateGroup( $groupRequest, $group ) ) -> handle(), 'Success', 'Group updated', Response::HTTP_OK );
    }

    /**
     * @param Group $group
     * @return JsonResponse|mixed
     * @throws \Exception
     */
    public function destroy( Group $group ) : JsonResponse
    {
        try
        {
            $group -> delete();
            return $this -> successResponse( null, 'Success', 'Group deleted', Response::HTTP_NO_CONTENT );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
