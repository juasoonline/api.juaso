<?php

namespace App\Observers\Juasoonline\Resource\Customer\Address;

use App\Models\Juasoonline\Resource\Customer\Address\Address;

class AddressObserver
{
    /**
     * @param Address $address
     */
    public function creating( Address $address )
    {
        $address -> resource_id = uniqid();
    }
}
