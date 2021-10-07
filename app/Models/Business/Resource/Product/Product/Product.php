<?php

namespace App\Models\Business\Resource\Product\Product;

use App\Models\Business\Resource\Product\Faq\Faq;
use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory as StoreSubcategory;
use App\Models\Juaso\Resource\Brand\Brand;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Models\Juaso\Resource\Tag\Tag;

use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Charge\Charge;
use App\Models\Business\Resource\Product\Bundle\Bundle;
use App\Models\Business\Resource\Product\Color\Color;
use App\Models\Business\Resource\Product\Overview\Overview;
use App\Models\Business\Resource\Product\Image\Image;
use App\Models\Business\Resource\Product\Promotion\Promotion;
use App\Models\Business\Resource\Product\Review\Review;
use App\Models\Business\Resource\Product\Size\Size;
use App\Models\Business\Resource\Product\Specification\Specification;
use App\Models\Juasoonline\Resource\Customer\Wishlist\Wishlist;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static paginate( int $int )
 */

class Product extends Model
{
    use HasFactory; use SoftDeletes;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : String { return 'resource_id'; }

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
    public function brand() : BelongsTo
    {
        return $this -> belongsTo( Brand::class );
    }

    /**
     * @return BelongsTo
     */
    public function charge() : BelongsTo
    {
        return $this -> belongsTo( Charge::class );
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this -> belongsToMany( Subcategory::class );
    }

    /**
     * @return BelongsToMany
     */
    public function store_categories(): BelongsToMany
    {
        return $this -> belongsToMany( StoreSubcategory::class, 'product_store_subcategory' );
    }

    /**
     * @return HasMany
     */
    public function images() : HasMany
    {
        return $this -> hasMany( Image::class );
    }

    /**
     * @return HasMany
     */
    public function specifications() : HasMany
    {
        return $this -> hasMany( Specification::class );
    }

    /**
     * @return HasMany
     */
    public function reviews() : HasMany
    {
        return $this -> hasMany( Review::class );
    }

    /**
     * @return HasMany
     */
    public function overviews() : HasMany
    {
        return $this -> hasMany( Overview::class );
    }

    /**
     * @return HasMany
     */
    public function colors() : HasMany
    {
        return $this -> hasMany( Color::class );
    }

    /**
     * @return HasMany
     */
    public function sizes() : HasMany
    {
        return $this -> hasMany( Size::class );
    }

    /**
     * @return HasMany
     */
    public function bundles() : HasMany
    {
        return $this -> hasMany( Bundle::class );
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this -> belongsToMany( Tag::class );
    }

    /**
     * @return HasMany
     */
    public function promotions() : HasMany
    {
        return $this -> hasMany( Promotion::class );
    }

    /**
     * @return HasMany
     */
    public function wishlist() : HasMany
    {
        return $this -> hasMany( Wishlist::class );
    }

    /**
     * @return HasMany
     */
    public function faqs() : HasMany
    {
        return $this -> hasMany( Faq::class );
    }

    /**
     * @return HasMany
     */
    public function review() : HasMany
    {
        return $this -> reviews();
    }

    /**
     * @return HasMany
     */
    public function mainImage() : HasMany
    {
        return $this -> images() -> limit( 1 ) -> select( 'image' );
    }

    /**
     * @return BelongsTo
     */
    public function productBrand() : BelongsTo
    {
        return $this -> brand() -> limit( 1 ) -> select( 'name' );
    }

    /**
     * @return BelongsTo
     */
    public function chargeValues(): BelongsTo
    {
        return $this -> charge() -> limit( 1 ) -> select( 'fee' );
    }
}
