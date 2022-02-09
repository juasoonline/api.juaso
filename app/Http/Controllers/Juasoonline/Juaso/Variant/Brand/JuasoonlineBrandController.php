<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Variant\Brand;

use App\Repositories\Juasoonline\Juaso\Variant\Brand\JuasoonlineBrandRepositoryInterface;
use App\Models\Juaso\Resource\Variant\Brand\Brand;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class JuasoonlineBrandController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineBrandController constructor.
     * @param JuasoonlineBrandRepositoryInterface $juasoonlineBrandRepository
     */
    public function __construct( JuasoonlineBrandRepositoryInterface $juasoonlineBrandRepository )
    {
        $this -> theRepository = $juasoonlineBrandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return $this -> theRepository -> index();
    }

    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @return JsonResponse
     */
    public function show( Brand $brand ) : JsonResponse
    {
        return $this -> theRepository -> show( $brand );
    }
}
