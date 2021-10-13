<?php

namespace App\Observers\Juasoonline\Resource\Customer\Customer;

use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Notifications\Juasoonline\Resource\Customer\Customer\RegistrationCodeNotification;
use Carbon\Carbon;

class CustomerObserver
{
    /**
     * @param Customer $customer
     */
    public function creating( Customer $customer )
    {
        $customer -> password = bcrypt( $customer -> password );
        $customer -> resource_id = generateProductID( 12 );
        $customer -> verification_code = generateRegistrationCode( 6, );
        $customer -> code_expiration_date = Carbon::now()->addDays(2);
    }

    public function created( Customer $customer )
    {
        $customer -> notify( new RegistrationCodeNotification( $customer ) );
    }
}
