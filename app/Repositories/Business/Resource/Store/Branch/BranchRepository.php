<?php

namespace App\Repositories\Business\Resource\Store\Branch;

use App\Http\Requests\Business\Resource\Store\Branch\BranchRequest;
use App\Http\Resources\Business\Resource\Store\Branch\BranchResource;
use App\Jobs\Business\Resource\Store\Branch\CreateBranch;
use App\Jobs\Business\Resource\Store\Branch\UpdateBranch;
use App\Models\Business\Resource\Store\Branch\Branch;
use App\Models\Business\Resource\Store\Store\Store;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class BranchRepository implements BranchRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @param Store $store
     * @return JsonResponse|mixed
     */
    public function index( Store $store ) : JsonResponse
    {
        return $this -> successResponse( BranchResource::collection( $store -> branches() -> get() ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param BranchRequest $branchRequest
     * @return JsonResponse|mixed
     */
    public function store( Store $store, BranchRequest $branchRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateBranch( $store, $branchRequest ) ) -> handle(), "Success", "Branch created", Response::HTTP_CREATED );
    }

    /**
     * @param Store $store
     * @param Branch $branch
     * @return JsonResponse|mixed
     */
    public function show( Store $store, Branch $branch ) : JsonResponse
    {
        checkResourceRelation( $store -> branches() -> where( 'branches.id', $branch -> id ) -> count());
        if ( $this -> loadRelationships() ) { $branch -> load( $this -> relationships ); }
        return $this -> successResponse( new BranchResource( $branch ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param BranchRequest $branchRequest
     * @param Branch $branch
     * @return JsonResponse|mixed
     */
    public function update( Store $store, BranchRequest $branchRequest, Branch $branch ) : JsonResponse
    {
        checkResourceRelation( $store -> branches() -> where( 'branches.id', $branch -> id ) -> count());
        if ( $this -> loadRelationships() ) { $branch -> load( $this -> relationships ); }
        return $this -> successResponse( ( new UpdateBranch( $branchRequest, $branch ) ) -> handle(), 'Success', 'Branch updated', Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param Branch $branch
     * @return JsonResponse|mixed|void
     */
    public function destroy( Store $store, Branch $branch ) : JsonResponse
    {
        checkResourceRelation( $store -> branches() -> where( 'branches.id', $branch -> id ) -> count());
        try
        {
            $branch -> delete();
            return $this -> successResponse( null, 'Success', 'Branch deleted.', Response::HTTP_NO_CONTENT );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
