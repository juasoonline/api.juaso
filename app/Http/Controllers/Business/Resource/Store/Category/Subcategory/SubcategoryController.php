<?php

namespace App\Http\Controllers\Business\Resource\Store\Category\Subcategory;

use App\Repositories\Business\Resource\Store\Category\Subcategory\SubcategoryRepositoryInterface;
use App\Http\Requests\Business\Resource\Store\Category\Subcategory\SubcategoryRequest;
use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SubcategoryController extends Controller
{
    private $theRepository;

    /**
     * BranchController constructor.
     * @param SubcategoryRepositoryInterface $storeSubcategoryRepository
     */
    public function __construct( SubcategoryRepositoryInterface $storeSubcategoryRepository )
    {
        $this -> theRepository = $storeSubcategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Category $storeCategory
     * @return JsonResponse
     */
    public function index( Category $storeCategory ) : JsonResponse
    {
        return $this -> theRepository -> index( $storeCategory );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Category $storeCategory
     * @param SubcategoryRequest $storeSubcategoryRequest
     * @return JsonResponse
     */
    public function store( Category $storeCategory, SubcategoryRequest $storeSubcategoryRequest ) : JsonResponse
    {
        return $this -> theRepository -> store( $storeCategory, $storeSubcategoryRequest );
    }

    /**
     * Display the specified resource.
     *
     * @param Category $storeCategory
     * @param Subcategory $storeSubcategory
     * @return JsonResponse
     */
    public function show( Category $storeCategory, Subcategory $storeSubcategory ) : JsonResponse
    {
        return $this -> theRepository -> show( $storeCategory, $storeSubcategory );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $storeCategory
     * @param SubcategoryRequest $storeSubcategoryRequest
     * @param Subcategory $storeSubcategory
     * @return JsonResponse
     */
    public function update( Category $storeCategory, SubcategoryRequest $storeSubcategoryRequest, Subcategory $storeSubcategory ) : JsonResponse
    {
        return $this -> theRepository -> update( $storeCategory, $storeSubcategoryRequest, $storeSubcategory );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $storeCategory
     * @param Subcategory $storeSubcategory
     * @return JsonResponse
     */
    public function destroy( Category $storeCategory, Subcategory $storeSubcategory ) : JsonResponse
    {
        return $this -> theRepository -> destroy( $storeCategory, $storeSubcategory );
    }
}
