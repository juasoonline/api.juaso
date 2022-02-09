<?php

namespace App\Repositories\Business\Resource\Store\Slider;

use App\Http\Requests\Business\Resource\Store\Slider\SliderRequest;
use App\Http\Resources\Business\Resource\Store\Slider\SliderResource;
use App\Models\Business\Resource\Store\Slider\Slider;
use App\Models\Business\Resource\Store\Store\Store;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SliderRepository implements SliderRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @param Store $store
     * @return JsonResponse
     */
    public function index( Store $store ) : JsonResponse
    {
        return $this -> successResponse( SliderResource::collection( $store -> sliders() -> get() ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Store $store
     * @param SliderRequest $sliderRequest
     * @return JsonResponse
     */
    public function store( Store $store, SliderRequest $sliderRequest ) : JsonResponse
    {
        //
    }

    /**
     * @param Store $store
     * @param Slider $slider
     * @return JsonResponse
     */
    public function show( Store $store, Slider $slider ) : JsonResponse
    {
        //
    }

    /**
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
     * @param Store $store
     * @param Slider $slider
     * @return JsonResponse
     */
    public function destroy( Store $store, Slider $slider ) : JsonResponse
    {
        //
    }
}
