<?php

namespace App\Models\Business\Resource\Store\Category\Subcategory;

use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Product\Product\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ], $table = 'store_subcategories';

    /**
     * @return string
     */
    public function getRouteKeyName () : string { return 'resource_id'; }


    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this -> belongsTo( Category::class, 'store_category_id' );
    }

    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this -> belongsToMany( Product::class );
    }
}
