<?php

namespace App\Http\Controllers\Business\Resource\Store\Slider;

use App\Http\Requests\Business\Resource\Store\Slider\SliderRequest;
use App\Models\Business\Resource\Store\Slider\Slider;
use App\Models\Business\Resource\Store\Store\Store;
use App\Repositories\Business\Resource\Store\Slider\SliderRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SliderController extends Controller
{
    private $theRepository;

    /**
     * SliderController constructor.
     * @param SliderRepositoryInterface $sliderRepository
     */
    public function __construct( SliderRepositoryInterface $sliderRepository )
    {
        $this -> theRepository = $sliderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse
    {
        return $this -> theRepository -> index( $store );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $store
     * @param SliderRequest $sliderRequest
     * @return JsonResponse
     */
    public function store( Store $store, SliderRequest $sliderRequest ) : JsonResponse
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Store $store
     * @param Slider $slider
     * @return JsonResponse
     */
    public function show( Store $store, Slider $slider ) : JsonResponse
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $store
     * @param SliderRequest $sliderRequest
     * @param Slider $slider
     * @return JsonResponse
     */
    public function update( Store $store, SliderRequest $sliderRequest, Slider $slider ) : JsonResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Store $store
     * @param Slider $slider
     * @return JsonResponse
     */
    public function destroy( Store $store, Slider $slider ) : JsonResponse
    {
        //
    }
}
