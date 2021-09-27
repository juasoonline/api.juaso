<?php

namespace App\Observers\Business\Resource\Product\Faq;

use App\Models\Business\Resource\Product\Faq\Faq;

class FaqObserver
{
    /**
     * @param Faq $faq
     */
    public function creating( Faq $faq )
    {
        $faq -> resource_id = uniqid();
    }
}
