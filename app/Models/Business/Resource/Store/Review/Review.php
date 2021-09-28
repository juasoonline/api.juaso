<?php

namespace App\Models\Business\Resource\Store\Review;

use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ], $table = 'store_reviews';

    /**
     * @return string
     */
    public function getRouteKeyName () : string { return 'resource_id'; }

    /**
     * @return BelongsTo
     */
    public function store() : BelongsTo
    {
        return $this -> belongsTo( Store::class );
    }

    /**
     * @return BelongsTo
     */
    public function customer() : BelongsTo
    {
        return $this -> belongsTo( Customer::class );
    }
}
