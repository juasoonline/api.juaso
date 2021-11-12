<?php

namespace App\Models\Business\Resource\Store\Store;

use App\Models\Business\Resource\Store\Category\Category\Category;
use App\Models\Business\Resource\Store\Coupon\Coupon;
use App\Models\Business\Resource\Store\Slider\Slider;
use App\Models\Juaso\Resource\Country\Country;
use App\Models\Business\Resource\Store\Branch\Branch;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Business\Resource\Store\Charge\Charge;
use App\Models\Business\Resource\Store\Review\Review;
use App\Models\Business\Resource\Store\Administrator\Administrator;
use App\Models\Juaso\Resource\Subscription\Subscription;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory; use SoftDeletes;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : string { return 'resource_id'; }

    /**
     * @return BelongsTo
     */
    public function country() : BelongsTo
    {
        return $this -> belongsTo( Country::class );
    }

    /**
     * @return BelongsTo
     */
    public function subscription() : BelongsTo
    {
        return $this -> belongsTo( Subscription::class );
    }

    /**
     * @return HasOne
     */
    public function administrator() : HasOne
    {
        return $this -> hasOne( Administrator::class );
    }

    /**
     * @return HasMany
     */
    public function branches() : HasMany
    {
        return $this -> hasMany( Branch::class );
    }

    /**
     * @return HasMany
     */
    public function sliders() : HasMany
    {
        return $this -> hasMany( Slider::class );
    }

    /**
     * @return HasMany
     */
    public function coupons() : HasMany
    {
        return $this -> hasMany( Coupon::class );
    }

    /**
     * @return HasMany
     */
    public function categories() : HasMany
    {
        return $this -> hasMany( Category::class );
    }

    /**
     * @return HasMany
     */
    public function charges() : HasMany
    {
        return $this -> hasMany( Charge::class );
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
    public function products() : HasMany
    {
        return $this -> hasMany( Product::class );
    }

    /**
     * @return HasOne
     */
    public function follower() : HasOne
    {
        return $this -> hasOne( Customer::class, 'store_id', 'id' );
    }

    /**
     * @return BelongsToMany
     */
    public function followers() : BelongsToMany
    {
        return $this -> belongsToMany( Customer::class );
    }
}
