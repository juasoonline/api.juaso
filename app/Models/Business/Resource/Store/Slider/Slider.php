<?php

namespace App\Models\Business\Resource\Store\Slider;

use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Store\Store\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ], $table = 'store_sliders';

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
    public function product() : BelongsTo
    {
        return $this -> belongsTo( Product::class );
    }
}
