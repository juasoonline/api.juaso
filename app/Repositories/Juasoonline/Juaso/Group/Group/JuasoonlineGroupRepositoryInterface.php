<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Group;

use App\Models\Juaso\Resource\Group\Group\Group;

use Illuminate\Http\JsonResponse;

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
}
