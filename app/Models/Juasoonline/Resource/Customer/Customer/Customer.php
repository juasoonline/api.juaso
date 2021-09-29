<?php

namespace App\Models\Juasoonline\Resource\Customer\Customer;

use App\Models\Business\Resource\Product\Faq\Faq;
use App\Models\Business\Resource\Store\Store\Store;
use App\Models\Juasoonline\Resource\Customer\Address\Address;
use App\Models\Juasoonline\Resource\Customer\Order\Order;
use App\Models\Juasoonline\Resource\Customer\Wishlist\Wishlist;
use App\Models\Juasoonline\Resource\Customer\Cart\Cart;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends User
{
    use HasFactory, SoftDeletes;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : string { return 'resource_id'; }

    /**
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this -> hasMany( Address::class );
    }

    /**
     * @return HasMany
     */
    public function wishlists(): HasMany
    {
        return $this -> hasMany( Wishlist::class );
    }

    /**
     * @return HasMany
     */
    public function carts(): HasMany
    {
        return $this -> hasMany( Cart::class );
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this -> hasMany( Order::class );
    }

    /**
     * @return BelongsToMany
     */
    public function stores(): BelongsToMany
    {
        return $this -> belongsToMany( Store::class, 'customer_store' );
    }

    /**
     * @return BelongsTo
     */
    public function follow(): BelongsTo
    {
        return $this -> belongsTo( Store::class, 'store_id', 'id' );
    }

    /**
     * @return HasMany
     */
    public function faqs() : HasMany
    {
        return $this -> hasMany( Faq::class );
    }
}
