<?php

namespace App\Models\Juaso\Resource\Group\Subcategory;

use App\Models\Business\Resource\Product\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubcategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'product_subcategory';

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this -> hasMany( Product::class, 'id', 'product_id' );
    }

    /**
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this -> hasMany( Subcategory::class, 'id', 'subcategory_id' );
    }
}
