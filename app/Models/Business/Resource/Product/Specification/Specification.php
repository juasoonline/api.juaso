<?php

namespace App\Models\Business\Resource\Product\Specification;

use App\Models\Business\Resource\Product\Product\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Specification extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : String { return 'resource_id'; }

    /**
     * @return BelongsTo
     */
    public function product () : BelongsTo
    {
        return $this -> belongsTo( Product::class );
    }
}
