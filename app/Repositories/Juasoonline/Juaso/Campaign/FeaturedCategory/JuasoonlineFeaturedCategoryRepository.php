<?php


namespace App\Repositories\Juasoonline\Juaso\Campaign\FeaturedCategory;

use App\Http\Resources\Juasoonline\Juaso\Campaign\FeaturedCategory\JuasoonlineFeaturedCategoryResource;
use App\Models\Juaso\Resource\Group\Category\Category;
use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineFeaturedCategoryRepository implements JuasoonlineFeaturedCategoryRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function getFeaturedCategories() : JsonResponse
    {
        $randCats = Category::inRandomOrder() -> limit( 3 ) -> get();
        return $this-> successResponse( JuasoonlineFeaturedCategoryResource::collection( $randCats ), "Success", null, Response::HTTP_OK );
    }
}
