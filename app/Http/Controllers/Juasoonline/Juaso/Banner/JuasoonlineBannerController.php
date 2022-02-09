<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Banner;

use App\Http\Controllers\Controller;
use App\Repositories\Juasoonline\Juaso\Banner\JuasoonlineBannerRepositoryInterface;
use Illuminate\Http\JsonResponse;

class JuasoonlineBannerController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineBannerController constructor.
     * @param JuasoonlineBannerRepositoryInterface $juasoonlineBannerTypeRepository
     */
    public function __construct( JuasoonlineBannerRepositoryInterface $juasoonlineBannerTypeRepository )
    {
        $this -> theRepository = $juasoonlineBannerTypeRepository;
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function getBanners() : JsonResponse
    {
        return $this -> theRepository -> getBanners();
    }
}
