<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Group;

use App\Models\Juaso\Resource\Group\Group\Group;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface JuasoonlineGroupRepositoryInterface
{
    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse;

    /**
     * @param Group $group
     * @return JsonResponse
     */
    public function show( Group $group ) : JsonResponse;

    /**
     * @param Group $group
     * @return AnonymousResourceCollection
     */
    public function products( Group $group ) : AnonymousResourceCollection;
}
