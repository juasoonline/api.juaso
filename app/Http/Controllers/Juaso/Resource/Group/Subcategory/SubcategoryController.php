<?php

namespace App\Http\Controllers\Juaso\Resource\Group\Subcategory;

use App\Http\Requests\Juaso\Resource\Group\Subcategory\SubcategoryRequest;
use App\Repositories\Juaso\Resource\Group\Subcategory\SubcategoryRepositoryInterface;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;

use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
    private $theRepository;

    /**
     * SubcategoryController constructor.
     * @param SubcategoryRepositoryInterface $subcategoryRepository
     */
    public function __construct( SubcategoryRepositoryInterface $subcategoryRepository )
    {
        $this -> theRepository = $subcategoryRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this -> theRepository -> index();
    }

    /**
     * @param SubcategoryRequest $subcategoryRequest
     * @return mixed
     */
    public function store( SubcategoryRequest $subcategoryRequest )
    {
        return $this -> theRepository -> store( $subcategoryRequest );
    }

    /**
     * @param Subcategory $subcategory
     * @return mixed
     */
    public function show( Subcategory $subcategory )
    {
        return $this -> theRepository -> show( $subcategory );
    }

    /**
     * @param SubcategoryRequest $subcategoryRequest
     * @param Subcategory $subcategory
     * @return mixed
     */
    public function update( SubcategoryRequest $subcategoryRequest, Subcategory $subcategory )
    {
        return $this -> theRepository -> update( $subcategoryRequest, $subcategory );
    }

    /**
     * @param Subcategory $subcategory
     * @return mixed
     */
    public function destroy( Subcategory $subcategory )
    {
        return $this -> theRepository -> destroy( $subcategory );
    }

    /**
     * @param Subcategory $subcategory
     * @return mixed
     */
    public function products( Subcategory $subcategory )
    {
        return $this -> theRepository -> products( $subcategory );
    }
}
