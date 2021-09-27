<?php

namespace App\Observers\Juasoonline\Resource\Customer\Cart;

use App\Models\Juasoonline\Resource\Customer\Cart\Cart;

class CartObserver
{
    /**
     * @param Cart $cart
     */
    public function creating(Cart $cart )
    {
        $cart -> resource_id = uniqid();
    }
}
