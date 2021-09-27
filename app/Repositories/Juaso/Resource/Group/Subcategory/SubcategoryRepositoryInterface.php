<?php

namespace App\Repositories\Juaso\Resource\Group\Subcategory;

use App\Http\Requests\Juaso\Resource\Group\Subcategory\SubcategoryRequest;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;

interface SubcategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index();

    /**
     * @param SubcategoryRequest $subcategoryRequest
     * @return mixed
     */
    public function store ( SubcategoryRequest $subcategoryRequest );

    /**
     * @param Subcategory $subcategory
     * @return mixed
     */
    public function show( Subcategory $subcategory );

    /**
     * @param SubcategoryRequest $subcategoryRequest
     * @param Subcategory $subcategory
     * @return mixed
     */
    public function update( SubcategoryRequest $subcategoryRequest, Subcategory $subcategory );

    /**
     * @param Subcategory $subcategory
     * @return mixed
     */
    public function destroy( Subcategory $subcategory );
}
