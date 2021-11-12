<?php

namespace App\Providers;

use App\Models\Business\Resource\Store\Slider\Slider;
use App\Models\Juaso\Resource\Country\Country;
use App\Observers\Business\Resource\Store\Slider\SliderObserver;
use App\Observers\Juaso\Resource\Country\CountryObserver;
use App\Models\Juaso\Resource\Brand\Brand;
use App\Observers\Juaso\Resource\Brand\BrandObserver;
use App\Models\Juaso\Resource\PromoType\PromoType;
use App\Observers\Juaso\Resource\PromoType\PromoTypeObserver;
use App\Models\Juaso\Resource\Group\Group\Group;
use App\Observers\Juaso\Resource\Group\Group\GroupObserver;
use App\Models\Juaso\Resource\Group\Category\Category;
use App\Observers\Juaso\Resource\Group\Category\CategoryObserver;
use App\Models\Juaso\Resource\Group\Subcategory\Subcategory;
use App\Observers\Juaso\Resource\Group\Subcategory\SubcategoryObserver;
use App\Models\Juaso\Resource\Subscription\Subscription;
use App\Observers\Juaso\Resource\Subscription\SubscriptionObserver;
use App\Models\Juaso\Resource\Tag\Tag;
use App\Observers\Juaso\Resource\Tag\TagObserver;
use App\Models\Juaso\Resource\DeliveryMethod\DeliveryMethod;
use App\Observers\Juaso\Resource\DeliveryMethod\DeliveryMethodObserver;
use App\Models\Juaso\Resource\PaymentMethod\PaymentMethod;
use App\Observers\Juaso\Resource\PaymentMethod\PaymentMethodObserver;
use App\Models\Juaso\Resource\Shipper\Shipper\Shipper;
use App\Observers\Juaso\Resource\Shipper\Shipper\ShipperObserver;
use App\Models\Juaso\Resource\Shipper\Agent\Agent;
use App\Observers\Juaso\Resource\Shipper\Agent\AgentObserver;
use App\Models\Juaso\Resource\Shipper\Transport\Transport;
use App\Observers\Juaso\Resource\Shipper\Transport\TransportObserver;


use App\Models\Business\Resource\Store\Store\Store;
use App\Observers\Business\Resource\Store\Store\StoreObserver;
use App\Models\Business\Resource\Store\Administrator\Administrator;
use App\Observers\Business\Resource\Store\Administrator\AdministratorObserver;
use App\Models\Business\Resource\Store\Branch\Branch;
use App\Observers\Business\Resource\Store\Branch\BranchObserver;
use App\Models\Business\Resource\Store\Charge\Charge;
use App\Observers\Business\Resource\Store\Charge\ChargeObserver;
use App\Models\Business\Resource\Store\Review\Review as StoreReview;
use App\Observers\Business\Resource\Store\Review\ReviewObserver as StoreReviewObserver;
use App\Models\Business\Resource\Store\Category\Category\Category as StoreCategory;
use App\Observers\Business\Resource\Store\Category\Category\CategoryObserver as StoreCategoryObserver;
use App\Models\Business\Resource\Store\Category\Subcategory\Subcategory as StoreSubcategory;
use App\Observers\Business\Resource\Store\Category\Subcategory\SubcategoryObserver as StoreSubcategoryObserver;
use App\Models\Business\Resource\Store\Coupon\Coupon;
use App\Observers\Business\Resource\Store\Coupon\CouponObserver;
use App\Models\Business\Resource\Product\Product\Product;
use App\Observers\Business\Resource\Product\Product\ProductObserver;
use App\Models\Business\Resource\Product\Image\Image;
use App\Observers\Business\Resource\Product\Image\ImageObserver;
use App\Models\Business\Resource\Product\Color\Color;
use App\Observers\Business\Resource\Product\Color\ColorObserver;
use App\Models\Business\Resource\Product\Size\Size;
use App\Observers\Business\Resource\Product\Size\SizeObserver;
use App\Models\Business\Resource\Product\Bundle\Bundle;
use App\Observers\Business\Resource\Product\Bundle\BundleObserver;
use App\Models\Business\Resource\Product\Overview\Overview;
use App\Observers\Business\Resource\Product\Overview\OverviewObserver;
use App\Models\Business\Resource\Product\Specification\Specification;
use App\Observers\Business\Resource\Product\Specification\SpecificationObserver;
use App\Models\Business\Resource\Product\Review\Review;
use App\Observers\Business\Resource\Product\Review\ReviewObserver;
use App\Models\Business\Resource\Product\Faq\Faq;
use App\Observers\Business\Resource\Product\Faq\FaqObserver;
use App\Models\Business\Resource\Product\Promotion\Promotion;
use App\Observers\Business\Resource\Product\Promotion\PromotionObserver;


use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Observers\Juasoonline\Resource\Customer\Customer\CustomerObserver;
use App\Models\Juasoonline\Resource\Customer\Address\Address;
use App\Observers\Juasoonline\Resource\Customer\Address\AddressObserver;
use App\Models\Juasoonline\Resource\Customer\Wishlist\Wishlist;
use App\Observers\Juasoonline\Resource\Customer\Wishlist\WishlistObserver;
use App\Models\Juasoonline\Resource\Customer\Cart\Cart;
use App\Observers\Juasoonline\Resource\Customer\Cart\CartObserver;
use App\Models\Juasoonline\Resource\Customer\Order\Order;
use App\Observers\Juasoonline\Resource\Customer\Order\OrderObserver;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Country::observe( CountryObserver::class );
        Brand::observe( BrandObserver::class );
        PromoType::observe( PromoTypeObserver::class );
        Group::observe( GroupObserver::class );
        Category::observe( CategoryObserver::class );
        Subcategory::observe( SubcategoryObserver::class );
        Subscription::observe( SubscriptionObserver::class );
        Tag::observe( TagObserver::class );
        PaymentMethod::observe( PaymentMethodObserver::class );
        DeliveryMethod::observe( DeliveryMethodObserver::class );
        Shipper::observe( ShipperObserver::class );
        Agent::observe( AgentObserver::class );
        Transport::observe( TransportObserver::class );

        Store::observe( StoreObserver::class );
        Administrator::observe( AdministratorObserver::class );
        Branch::observe( BranchObserver::class );
        Charge::observe( ChargeObserver::class );
        StoreReview::observe( StoreReviewObserver::class );
        StoreCategory::observe( StoreCategoryObserver::class );
        StoreSubcategory::observe( StoreSubcategoryObserver::class );
        Coupon::observe( CouponObserver::class );
        Slider::observe( SliderObserver::class );
        Product::observe( ProductObserver::class );
        Image::observe( ImageObserver::class );
        Color::observe( ColorObserver::class );
        Size::observe( SizeObserver::class );
        Bundle::observe( BundleObserver::class );
        Specification::observe( SpecificationObserver::class );
        Overview::observe( OverviewObserver::class );
        Review::observe( ReviewObserver::class );
        Faq::observe( FaqObserver::class );
        Promotion::observe( PromotionObserver::class );

        Customer::observe( CustomerObserver::class );
        Address::observe( AddressObserver::class );
        Wishlist::observe( WishlistObserver::class );
        Cart::observe( CartObserver::class );
        Order::observe( OrderObserver::class );
    }
}
