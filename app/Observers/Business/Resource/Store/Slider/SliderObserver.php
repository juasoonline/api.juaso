<?php

namespace App\Observers\Business\Resource\Store\Slider;

use App\Models\Business\Resource\Store\Slider\Slider;

class SliderObserver
{
    /**
     * @param Slider $slider
     */
    public function creating( Slider $slider )
    {
        $slider -> resource_id = uniqid();
    }
}
