<?php

namespace App\Repositories\Juasoonline\Juaso\Group\Category;


use App\Http\Resources\Juaso\Resource\Group\Category\CategoryResource;
use App\Models\Juaso\Resource\Group\Category\Category;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JuasoonlineCategoryRepository implements JuasoonlineCategoryRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $Category = Category::query() -> when( $this -> loadRelationships(), function ( Builder $builder ) { return $builder -> with ( $this -> relationships ); } ) -> get();
        return $this -> successResponse( CategoryResource::collection( $Category ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function show( Category $category ) : JsonResponse
    {
        if ( $this -> loadRelationships() ) { $category -> load( $this -> relationships ); }
        return $this -> successResponse( new CategoryResource( $category ), "Success", null, Response::HTTP_OK );
    }
}
