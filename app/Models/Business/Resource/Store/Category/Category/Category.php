<?php

namespace App\Models\Business\Resource\Store\Category\Category;

use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory;
use App\Models\Business\Resource\Store\Store\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ], $table = 'store_categories';

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
     * @return HasMany
     */
    public function subcategories() : HasMany
    {
        return $this -> hasMany( Subcategory::class, 'store_category_id' );
    }
}
