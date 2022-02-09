<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Campaign\FeaturedCategory;

use App\Repositories\Juasoonline\Juaso\Campaign\FeaturedCategory\JuasoonlineFeaturedCategoryRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineFeaturedCategoryController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineFeaturedCategoryController constructor.
     * @param JuasoonlineFeaturedCategoryRepositoryInterface $juasoonlineFeaturedCategoryRepository
     */
    public function __construct( JuasoonlineFeaturedCategoryRepositoryInterface $juasoonlineFeaturedCategoryRepository )
    {
        $this -> theRepository = $juasoonlineFeaturedCategoryRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getFeaturedCategories() : JsonResponse
    {
        return $this -> theRepository -> getFeaturedCategories();
    }
}
