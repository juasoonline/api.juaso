<?php

namespace App\Observers\Business\Resource\Store\Administrator;

use App\Models\Business\Resource\Store\Administrator\Administrator;

class AdministratorObserver
{
    /**
     * @param Administrator $storeAdministrator
     */
    public function creating(Administrator $storeAdministrator )
    {
        $storeAdministrator -> resource_id = uniqid();
    }
}
