<?php


namespace App\Repositories\Juasoonline\Juaso\Campaign\FeaturedCategory;

use App\Http\Resources\Juasoonline\Juaso\Campaign\FeaturedCategory\JuasoonlineFeaturedCategoryResource;
use App\Models\Business\Resource\Product\Product\Product;

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
        $flashDeals = Product::query() -> where( 'status', '=', 000 ) -> orderByDesc( 'created_at' ) -> paginate( 10 );
        return $this -> successResponse( JuasoonlineFeaturedCategoryResource::collection( $flashDeals ) -> response() -> getData( true ), "Success", null, Response::HTTP_OK );
    }
}
