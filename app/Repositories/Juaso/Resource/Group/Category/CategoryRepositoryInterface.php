<?php

namespace App\Repositories\Juaso\Resource\Group\Category;

use App\Http\Requests\Juaso\Resource\Group\Category\CategoryRequest;
use App\Models\Juaso\Resource\Group\Category\Category;

interface CategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index();

    /**
     * @param CategoryRequest $categoryRequest
     * @return mixed
     */
    public function store (CategoryRequest $categoryRequest );

    /**
     * @param Category $category
     * @return mixed
     */
    public function show( Category $category );

    /**
     * @param CategoryRequest $categoryRequest
     * @param Category $category
     * @return mixed
     */
    public function update( CategoryRequest $categoryRequest, Category $category );

    /**
     * @param Category $category
     * @return mixed
     */
    public function destroy( Category $category );

    /**
     * @param Category $category
     * @return mixed
     */
    public function products( Category $category );
}
