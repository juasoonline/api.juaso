<?php

namespace App\Models\Business\Resource\Product\Product;

use App\Models\Juaso\Resource\Variant\Brand\Brand;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Models\Juaso\Resource\Sale\AnniversarySale\AnniversarySale;
use App\Models\Juaso\Resource\Sale\BlackFriday\BlackFriday;
use App\Models\Juaso\Resource\Sale\ChristmasSale\ChristmasSale;
use App\Models\Juaso\Resource\Sale\CyberMonday\CyberMonday;
use App\Models\Juaso\Resource\Sale\EasterSale\EasterSale;
use App\Models\Juaso\Resource\Tag\Tag;
use App\Models\Juaso\Resource\Sale\FlashDeal\FlashDeal;
use App\Models\Juaso\Resource\Sale\WeeklyDeal\WeeklyDeal;

use App\Models\Business\Resource\Product\Faq\Faq;
use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory as StoreSubcategory;
use App\Models\Business\Resource\Store\Slider\Slider;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Business\Resource\Store\Charge\Charge;
use App\Models\Business\Resource\Product\Bundle\Bundle;
use App\Models\Business\Resource\Product\Color\Color;
use App\Models\Business\Resource\Product\Overview\Overview;
use App\Models\Business\Resource\Product\Image\Image;
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
    public function productBrand() : BelongsTo
    {
        return $this -> brand() -> limit( 1 ) -> select( 'name' );
    }

    /**
     * @return BelongsTo
     */
    public function charge() : BelongsTo
    {
        return $this -> belongsTo( Charge::class );
    }

    /**
     * @return BelongsTo
     */
    public function chargeValues(): BelongsTo
    {
        return $this -> charge() -> limit( 1 ) -> select( 'fee' );
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
    public function productCategories(): BelongsToMany
    {
        return $this -> belongsToMany( Subcategory::class, 'product_subcategory' ) -> with( 'subcategory' ) -> withPivot( 'product_id', 'subcategory_id' );
    }

    /**
     * @return BelongsToMany
     */
    public function store_categories(): BelongsToMany
    {
        return $this -> belongsToMany( StoreSubcategory::class, 'product_store_subcategory' );
    }

    /**
     * @return BelongsTo
     */
    public function sliders() : BelongsTo
    {
        return $this -> belongsTo( Slider::class );
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
    public function mainImage() : HasMany
    {
        return $this -> images() -> limit( 1 ) -> select( 'image' );
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
    public function review() : HasMany
    {
        return $this -> reviews();
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
     * @return BelongsTo
     */
    public function flash_deal()
    {
//        return $this -> belongsTo( FlashDeal::class );
    }

    /**
     * @return BelongsTo
     */
    public function weekly_deal()
    {
//        return $this -> belongsTo( WeeklyDeal::class );
    }

    /**
     * @return BelongsTo
     */
    public function black_friday() : BelongsTo
    {
        return $this -> belongsTo( BlackFriday::class );
    }

    /**
     * @return BelongsTo
     */
    public function christmas_sale() : BelongsTo
    {
        return $this -> belongsTo( ChristmasSale::class );
    }

    /**
     * @return BelongsTo
     */
    public function easter_sale() : BelongsTo
    {
        return $this -> belongsTo( EasterSale::class );
    }

    /**
     * @return BelongsTo
     */
    public function anniversary_sale() : BelongsTo
    {
        return $this -> belongsTo( AnniversarySale::class );
    }

    /**
     * @return BelongsTo
     */
    public function cyber_monday() : BelongsTo
    {
        return $this -> belongsTo( CyberMonday::class );
    }
}
