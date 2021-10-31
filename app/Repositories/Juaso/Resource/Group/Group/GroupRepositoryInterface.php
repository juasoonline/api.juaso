<?php

namespace App\Repositories\Juaso\Resource\Group\Group;

use App\Http\Requests\Juaso\Resource\Group\Group\GroupRequest;
use App\Models\Juaso\Resource\Group\Group\Group;

interface GroupRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index();

    /**
     * @param GroupRequest $groupRequest
     * @return mixed
     */
    public function store ( GroupRequest $groupRequest );

    /**
     * @param Group $group
     * @return mixed
     */
    public function show( Group $group );

    /**
     * @param GroupRequest $groupRequest
     * @param Group $group
     * @return mixed
     */
    public function update( GroupRequest $groupRequest, Group $group );

    /**
     * @param Group $group
     * @return mixed
     */
    public function destroy( Group $group );

    /**
     * @param Group $group
     * @return mixed
     */
    public function products( Group $group );
}
