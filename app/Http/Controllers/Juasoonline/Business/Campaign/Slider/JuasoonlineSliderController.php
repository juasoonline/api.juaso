<?php

namespace App\Http\Controllers\Juasoonline\Business\Campaign\Slider;

use App\Repositories\Juasoonline\Business\Campaign\Slider\JuasoonlineSliderRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineSliderController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineSliderController constructor.
     * @param JuasoonlineSliderRepositoryInterface $juasoonlineSliderRepository
     */
    public function __construct( JuasoonlineSliderRepositoryInterface $juasoonlineSliderRepository )
    {
        $this -> theRepository = $juasoonlineSliderRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getSliders() : JsonResponse
    {
        return $this -> theRepository -> getSliders();
    }
}
