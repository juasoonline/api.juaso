<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Group\Subcategory;

use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Repositories\Juasoonline\Juaso\Group\Subcategory\JuasoonlineSubcategoryRepository;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineSubcategoryController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineSubcategoryController constructor.
     * @param JuasoonlineSubcategoryRepository $juasoonlineSubcategoryRepository
     */
    public function __construct( JuasoonlineSubcategoryRepository $juasoonlineSubcategoryRepository )
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
}
