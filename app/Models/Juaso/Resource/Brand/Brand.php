<?php

namespace App\Models\Juaso\Resource\Brand;

use App\Models\Business\Resource\Product\Product\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : string { return 'resource_id'; }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this -> hasMany( Product::class );
    }
}
