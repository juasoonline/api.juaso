<?php

namespace App\Observers\Juasoonline\Resource\Customer\Wishlist;

use App\Models\Juasoonline\Resource\Customer\Wishlist\Wishlist;

class WishlistObserver
{
    /**
     * @param Wishlist $wishlist
     */
    public function creating(Wishlist $wishlist )
    {
        $wishlist -> resource_id = uniqid();
    }
}
