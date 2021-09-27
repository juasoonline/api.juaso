<?php

namespace App\Http\Controllers\Juaso\Resource\Group\Category;

use App\Http\Requests\Juaso\Resource\Group\Category\CategoryRequest;
use App\Repositories\Juaso\Resource\Group\Category\CategoryRepositoryInterface;
use App\Models\Juaso\Resource\Group\Category\Category;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $theRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct( CategoryRepositoryInterface $categoryRepository )
    {
        $this -> theRepository = $categoryRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this -> theRepository -> index();
    }

    /**
     * @param CategoryRequest $categoryRequest
     * @return mixed
     */
    public function store( CategoryRequest $categoryRequest )
    {
        return $this -> theRepository -> store( $categoryRequest );
    }

    /**
     * @param Category $category
     * @return mixed
     */
    public function show( Category $category )
    {
        return $this -> theRepository -> show( $category );
    }

    /**
     * @param CategoryRequest $categoryRequest
     * @param Category $category
     * @return mixed
     */
    public function update( CategoryRequest $categoryRequest, Category $category )
    {
        return $this -> theRepository -> update( $categoryRequest, $category );
    }

    /**
     * @param Category $category
     * @return mixed
     */
    public function destroy( Category $category )
    {
        return $this -> theRepository -> destroy( $category );
    }
}
