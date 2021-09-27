<?php

namespace App\Observers\Juasoonline\Resource\Customer\Customer;

use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

class CustomerObserver
{
    /**
     * @param Customer $customer
     */
    public function creating( Customer $customer )
    {
        $customer -> resource_id = generateProductID( 12 );
    }
}
