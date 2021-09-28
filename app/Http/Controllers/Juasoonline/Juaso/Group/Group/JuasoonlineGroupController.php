<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Group\Group;

use App\Models\Juaso\Resource\Group\Group\Group;
use App\Repositories\Juasoonline\Juaso\Group\Group\JuasoonlineGroupRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineGroupController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineGroupController constructor.
     * @param JuasoonlineGroupRepositoryInterface $juasoonlineGroupRepository
     */
    public function __construct( JuasoonlineGroupRepositoryInterface $juasoonlineGroupRepository )
    {
        $this -> theRepository = $juasoonlineGroupRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return $this -> theRepository -> index();
    }

    /**
     * @param Group $group
     * @return JsonResponse
     */
    public function show( Group $group ) : JsonResponse
    {
        return $this -> theRepository -> show( $group );
    }
}
