<?php

namespace App\Models\Juaso\Resource\Sale\BlackFriday;

use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Juaso\Resource\Sale\Category\Category;
use App\Models\Juaso\Resource\Sale\Sale\Sale;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlackFriday extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName (): string { return 'resource_id'; }

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
    public function category() : BelongsTo
    {
        return $this -> belongsTo( Category::class );
    }

    /**
     * @return BelongsTo
     */
    public function sale() : BelongsTo
    {
        return $this -> belongsTo( Sale::class );
    }
}
