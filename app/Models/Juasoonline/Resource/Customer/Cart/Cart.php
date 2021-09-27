<?php

namespace App\Models\Juasoonline\Resource\Customer\Cart;

use App\Models\Business\Resource\Product\Bundle\Bundle;
use App\Models\Business\Resource\Product\Color\Color;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Product\Size\Size;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [ 'id', 'resource_id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : string { return 'resource_id'; }

    /**
     * @return BelongsTo
     */
    public function customer() : BelongsTo
    {
        return $this -> belongsTo( Customer::class );
    }

    /**
     * @return BelongsTo
     */
    public function product() : BelongsTo
    {
        return $this -> belongsTo( Product::class );
    }

    /**
     * @return BelongsTo
     */
    public function color() : BelongsTo
    {
        return $this -> belongsTo( Color::class );
    }

    /**
     * @return BelongsTo
     */
    public function size() : BelongsTo
    {
        return $this -> belongsTo( Size::class );
    }

    /**
     * @return BelongsTo
     */
    public function bundle() : BelongsTo
    {
        return $this -> belongsTo( Bundle::class );
    }
}
