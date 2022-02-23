<?php

namespace App\Models\Juaso\Resource\Slider;

use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Juaso\Resource\Sale\Sale\Sale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : string { return 'resource_id'; }

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this -> belongsTo( Product::class );
    }

    /**
     * @return BelongsTo
     */
    public function product_resource()
    {
        return $this -> product() -> limit( 1 ) -> select( 'resource_id' );
    }

    /**
     * @return BelongsTo
     */
    public function sale()
    {
        return $this -> belongsTo( Sale::class );
    }

    /**
     * @return BelongsTo
     */
    public function sale_resource()
    {
        return $this -> sale() -> limit( 1 ) -> select( 'resource_id', 'slug' );
    }
}
