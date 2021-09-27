<?php

namespace App\Models\Juaso\Resource\Tag;

use App\Models\Business\Resource\Product\Product\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : String { return 'resource_id'; }

    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this -> belongsToMany( Product::class );
    }
}
