<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Group\Category;

use App\Models\Juaso\Resource\Group\Category\Category;
use App\Repositories\Juasoonline\Juaso\Group\Category\JuasoonlineCategoryRepositoryInterface;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class JuasoonlineCategoryController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineCategoryController constructor.
     * @param JuasoonlineCategoryRepositoryInterface $juasoonlineCategoryRepository
     */
    public function __construct( JuasoonlineCategoryRepositoryInterface $juasoonlineCategoryRepository )
    {
        $this -> theRepository = $juasoonlineCategoryRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return $this -> theRepository -> index();
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function show( Category $category ) : JsonResponse
    {
        return $this -> theRepository -> show( $category );
    }
}
