<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Group\Subcategory;

use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Repositories\Juasoonline\Juaso\Group\Subcategory\JuasoonlineSubcategoryRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineSubcategoryController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineSubcategoryController constructor.
     * @param JuasoonlineSubcategoryRepositoryInterface $juasoonlineSubcategoryRepository
     */
    public function __construct( JuasoonlineSubcategoryRepositoryInterface $juasoonlineSubcategoryRepository )
    {
        $this -> theRepository = $juasoonlineSubcategoryRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return $this -> theRepository -> index();
    }

    /**
     * @param Subcategory $subcategory
     * @return JsonResponse
     */
    public function show( Subcategory $subcategory ) : JsonResponse
    {
        return $this -> theRepository -> show( $subcategory );
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
