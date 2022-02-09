<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Slider;

use App\Repositories\Juasoonline\Juaso\Slider\JuasoonlineSliderRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineSliderController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineSliderController constructor.
     * @param JuasoonlineSliderRepositoryInterface $juasoonlineSliderTypeRepository
     */
    public function __construct( JuasoonlineSliderRepositoryInterface $juasoonlineSliderTypeRepository )
    {
        $this -> theRepository = $juasoonlineSliderTypeRepository;
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function getSliders() : JsonResponse
    {
        return $this -> theRepository -> getSliders();
    }
}
