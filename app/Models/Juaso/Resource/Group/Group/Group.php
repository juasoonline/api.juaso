<?php

namespace App\Models\Juaso\Resource\Group\Group;

use App\Models\Juaso\Resource\Group\Category\Category;

use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Group extends Model
{
    use HasFactory, SoftDeletes, HasRelationships;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : String { return 'resource_id'; }

    /**
     * @return HasMany
     */
    public function categories() : HasMany
    {
        return $this -> hasMany( Category::class );
    }

    /**
     * @return HasManyThrough
     */
    public function products() : HasManyThrough
    {
        return $this -> hasManyThrough( Subcategory::class, Category::class );
    }
}
