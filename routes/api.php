<?php

use App\Http\Controllers\Juaso\Resource\Country\CountryController;
use App\Http\Controllers\Juaso\Resource\Brand\BrandController;
use App\Http\Controllers\Juaso\Resource\PromoType\PromoTypeController;
use App\Http\Controllers\Juaso\Resource\Group\Group\GroupController;
use App\Http\Controllers\Juaso\Resource\Group\Category\CategoryController;
use App\Http\Controllers\Juaso\Resource\Group\Subcategory\SubcategoryController;
use App\Http\Controllers\Juaso\Resource\Subscription\SubscriptionController;
use App\Http\Controllers\Juaso\Resource\PaymentMethod\PaymentMethodController;
use App\Http\Controllers\Juaso\Resource\DeliveryMethod\DeliveryMethodController;
use App\Http\Controllers\Juaso\Resource\Shipper\Shipper\ShipperController;
use App\Http\Controllers\Juaso\Resource\Shipper\Agent\AgentController;
use App\Http\Controllers\Juaso\Resource\Shipper\Transport\TransportController;


use App\Http\Controllers\Business\Resource\Store\Store\StoreController;
use App\Http\Controllers\Business\Resource\Store\Administrator\AdministratorController;
use App\Http\Controllers\Business\Resource\Store\Branch\BranchController;
use App\Http\Controllers\Business\Resource\Store\Charge\ChargeController;
use App\Http\Controllers\Business\Resource\Store\Review\ReviewController as StoreReviewController;
use App\Http\Controllers\Business\Resource\Store\Follower\FollowerController;
use App\Http\Controllers\Business\Resource\Store\Category\Category\CategoryController as StoreCategoryController;
use App\Http\Controllers\Business\Resource\Store\Category\Subcategory\SubcategoryController as StoreSubcategoryController;
use App\Http\Controllers\Business\Resource\Store\Coupon\CouponController;
use App\Http\Controllers\Business\Resource\Product\Product\ProductController;
use App\Http\Controllers\Business\Resource\Product\Specification\SpecificationController;
use App\Http\Controllers\Business\Resource\Product\Image\ImageController;
use App\Http\Controllers\Business\Resource\Product\Color\ColorController;
use App\Http\Controllers\Business\Resource\Product\Size\SizeController;
use App\Http\Controllers\Business\Resource\Product\Bundle\BundleController;
use App\Http\Controllers\Business\Resource\Product\Overview\OverviewController;
use App\Http\Controllers\Business\Resource\Product\Review\ReviewController;
use App\Http\Controllers\Business\Resource\Product\Faq\FaqController;
use App\Http\Controllers\Business\Resource\Product\Promotion\PromotionController;


use App\Http\Controllers\Juasoonline\Resource\Customer\Customer\CustomerController;
use App\Http\Controllers\Juasoonline\Resource\Customer\Address\AddressController;
use App\Http\Controllers\Juasoonline\Resource\Customer\Wishlist\WishlistController;
use App\Http\Controllers\Juasoonline\Resource\Customer\Cart\CartController;
use App\Http\Controllers\Juasoonline\Resource\Customer\Order\OrderController;
use App\Http\Controllers\Juasoonline\Resource\Customer\Store\CustomerStoreController;

use App\Http\Controllers\Juasoonline\Juaso\Country\JuasoonlineCountryController;
use App\Http\Controllers\Juasoonline\Juaso\Brand\JuasoonlineBrandController;
use App\Http\Controllers\Juasoonline\Juaso\Group\Group\JuasoonlineGroupController;
use App\Http\Controllers\Juasoonline\Juaso\Group\Category\JuasoonlineCategoryController;
use App\Http\Controllers\Juasoonline\Juaso\Group\Subcategory\JuasoonlineSubcategoryController;
use App\Http\Controllers\Juasoonline\Juaso\DeliveryMethod\JuasoonlineDeliveryMethodController;
use App\Http\Controllers\Juasoonline\Juaso\PaymentMethod\JuasoonlinePaymentMethodController;

use App\Http\Controllers\Juasoonline\Business\Store\JuasoonlineStoreController;
use App\Http\Controllers\Juasoonline\Business\Product\JuasoonlineProductController;
use App\Http\Controllers\Juasoonline\Business\Ad\JuasoonlineAdController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'api/v1'], function ()
{
    // Juaso resource routes
    Route::group(['prefix' => 'juaso'], function ()
    {
        // Juaso resources
        Route::group(['prefix' => 'resources'], function ()
        {
            Route::apiResource('countries', CountryController::class );
            Route::apiResource('brands', BrandController::class );
            Route::apiResource('promo-types', PromoTypeController::class );
            Route::apiResource('subscriptions', SubscriptionController::class, [ 'parameters' => [ 'subscriptions' => 'vendor_subscription' ]] );

            Route::apiResource('groups', GroupController::class );
            Route::apiResource('categories', CategoryController::class );
            Route::apiResource('subcategories', SubcategoryController::class );

            Route::apiResource('payment-methods', PaymentMethodController::class );
            Route::apiResource('delivery-methods', DeliveryMethodController::class );

            Route::apiResource('shippers', ShipperController::class );
            Route::apiResource('shippers.agents', AgentController::class );
            Route::apiResource('shippers.transports', TransportController::class );

            // Resources
            Route::get( 'groups/{group}/products', [GroupController::class, 'products'] ) -> name('group.products');
            Route::get( 'categories/{category}/products', [CategoryController::class, 'products'] ) -> name('category.products');
            Route::get( 'subcategories/{subcategory}/products', [SubcategoryController::class, 'products'] ) -> name('subcategory.products');
        });
    });

    // Business resource routes
    Route::group(['prefix' => 'business'], function ()
    {
        // Business resources
        Route::group([], function()
        {
            // Store and related resources
            Route::apiResource( 'stores', StoreController::class ) -> except('index', 'destroy');
            Route::apiResource( 'stores.administrators', AdministratorController::class, [ 'parameters' => [ 'administrators' => 'store_administrator' ]] ) -> except('index', 'destroy');
            Route::apiResource( 'stores.branches', BranchController::class );
            Route::apiResource( 'stores.charges', ChargeController::class ) -> only( 'index', 'show' );
            Route::apiResource( 'stores.reviews', StoreReviewController::class ) -> only( 'index', 'show', 'update' );
            Route::apiResource( 'stores.followers', FollowerController::class ) -> only( 'index', 'show' );
            Route::apiResource( 'stores.coupons', CouponController::class, [ 'parameters' => [ 'stores' => 'store', 'coupons' => 'store_coupon' ]] );

            // Store categories related resources
            Route::apiResource( 'stores.categories', StoreCategoryController::class, [ 'parameters' => [ 'stores' => 'store', 'categories' => 'store_category' ]] );
            Route::apiResource( 'categories.subcategories', StoreSubcategoryController::class, [ 'parameters' => [ 'categories' => 'store_category', 'subcategories' => 'store_subcategory' ]] );

            // Store product resource
            Route::apiResource( 'stores.products', ProductController::class ) -> only( 'index', 'store', 'show', 'update' );

            // Product and related resources
            Route::apiResource( 'products.specifications', SpecificationController::class );
            Route::apiResource( 'products.images', ImageController::class );
            Route::apiResource( 'products.colors', ColorController::class );
            Route::apiResource( 'products.sizes', SizeController::class );
            Route::apiResource( 'products.bundles', BundleController::class );
            Route::apiResource( 'products.overviews', OverviewController::class );
            Route::apiResource( 'products.reviews', ReviewController::class );
            Route::apiResource( 'products.faqs', FaqController::class );
            Route::apiResource( 'products.promotions', PromotionController::class );

            // Other store resources
            Route::get( 'stores/{store}/reviews/stats', [StoreReviewController::class, 'getStats'] ) -> name('stores.reviews.stats');
            Route::get( 'products/{products}/reviews/stats', [ReviewController::class, 'getStats'] ) -> name('products.reviews.stats');
        });
    });

    // Juasoonline resource routes
    Route::group(['prefix' => 'juasoonline'], function ()
    {
        // Customers unauthenticated (Unprotected) routes
        Route::group(['prefix' => 'customers/authentication'], function ()
        {
            // Registration routes
            Route::group(['prefix' => 'registration'], function ()
            {
                Route::post('', [CustomerController::class, 'store']);
                Route::post('code/verification', [CustomerController::class, 'registrationCodeVerification']);
                Route::post('code/resend', [CustomerController::class, 'registrationCodeResend']);
            });

            // Password reset
            Route::group(['prefix' => 'password/reset'], function ()
            {
                Route::post('email/verification', [CustomerController::class, 'passwordResetVerification']);
                Route::post('code/verification', [CustomerController::class, 'passwordResetCodeVerification']);
                Route::post('', [CustomerController::class, 'resetPassword']);
            });

            Route::post('login', [CustomerController::class, 'login']);
        });

        // Customers authenticated (Protected) routes
        Route::group(['prefix' => '', 'middleware' => 'auth:customer'], function ()
        {
            // Login / Logout routes
            Route::post('logout', [CustomerController::class, 'logOut']);
            Route::post('change-password', [CustomerController::class, 'changePassword']);

            // Customer resource
            Route::apiResource( 'customers', CustomerController::class ) -> only( 'show', 'update');
            Route::apiResource( 'customers.addresses', AddressController::class );
            Route::apiResource( 'customers.wishlists', WishlistController::class ) -> only( 'index', 'store', 'destroy');
            Route::apiResource( 'customers.carts', CartController::class ) -> only( 'index', 'store', 'update', 'destroy');

            Route::get('customers/{customer}/stats', [CustomerController::class, 'getStats']);
            Route::get('customers/{customer}/wishlists/{product}', [WishlistController::class, 'checkList']);

            // Store and product create reviews / faq
            Route::post('customers/{customer}/stores/{store}/reviews', [CustomerController::class, 'createStoreReview']);
            Route::post('customers/{customer}/stores/{store}/reviews', [CustomerController::class, 'createStoreReview']);
            Route::post('customers/{customer}/products/{product}/reviews', [CustomerController::class, 'createProductReview']);
            Route::post('customers/{customer}/products/{product}/faqs', [CustomerController::class, 'createProductFaq']);

            // Customer order resource
            Route::get( 'customers/{customer}/orders', [ OrderController::class, 'index' ]);
            Route::post( 'customers/{customer}/orders', [ OrderController::class, 'store' ]);
            Route::get( 'customers/{customer}/orders/{order}', [ OrderController::class, 'show' ]);
            Route::patch( 'customers/{customer}/orders/{order}/quantity', [ OrderController::class, 'updateQuantity' ]);
            Route::patch( 'customers/{customer}/orders/{order}/coupon', [ OrderController::class, 'updateCoupon' ]);
            Route::patch( 'customers/{customer}/orders/{order}/promotion', [ OrderController::class, 'updatePromo' ]);
            Route::patch( 'customers/{customer}/orders/{order}/delivery-method', [ OrderController::class, 'updateDeliveryMethod' ]);
            Route::post( 'customers/{customer}/orders/{order}/confirmation', [ OrderController::class, 'orderConfirmation' ]);

            // Customer store resource
            Route::get('customers/{customer}/stores', [CustomerStoreController::class, 'getStores']);
            Route::get('customers/{customer}/stores/{store}', [CustomerStoreController::class, 'getStore']);
            Route::post('customers/{customer}/stores/{store}/follow', [CustomerStoreController::class, 'follow']);
            Route::post('customers/{customer}/stores/{store}/unfollow', [CustomerStoreController::class, 'unFollow']);
        });

        // Juaso resources
        Route::group(['prefix' => 'juaso'], function ()
        {
            Route::apiResource( 'countries', JuasoonlineCountryController::class ) -> only( 'index', 'show' );
            Route::apiResource( 'brands', JuasoonlineBrandController::class ) -> only( 'index', 'show' );
            Route::apiResource( 'groups', JuasoonlineGroupController::class ) -> only( 'index', 'show' );
            Route::apiResource( 'categories', JuasoonlineCategoryController::class ) -> only( 'index', 'show' );
            Route::apiResource( 'subcategories', JuasoonlineSubcategoryController::class ) -> only( 'index', 'show' );
            Route::apiResource( 'delivery-methods', JuasoonlineDeliveryMethodController::class ) -> only( 'index', 'show' );
            Route::apiResource( 'payment-methods', JuasoonlinePaymentMethodController::class ) -> only( 'index', 'show' );

            // Resources
            Route::get( 'groups/{group}/products', [JuasoonlineGroupController::class, 'products'] ) -> name('group.products');
            Route::get( 'categories/{group}/products/brands', [JuasoonlineGroupController::class, 'products'] ) -> name('category.products.brands');

            Route::get( 'categories/{category}/products', [JuasoonlineCategoryController::class, 'products'] ) -> name('category.products');
            Route::get( 'categories/{category}/products/brands', [JuasoonlineCategoryController::class, 'products'] ) -> name('category.products.brands');

            Route::get( 'subcategories/{subcategory}/products', [JuasoonlineSubcategoryController::class, 'products'] ) -> name('subcategory.products');
            Route::get( 'subcategories/{subcategory}/products/brands', [JuasoonlineSubcategoryController::class, 'brands'] ) -> name('subcategory.products.brands');
            Route::get( 'subcategories/products/rankings', [JuasoonlineSubcategoryController::class, 'topRankings']) -> name('subcategory.products.rankings');
        });

        // Business resources
        Route::group(['prefix' => 'business'], function ()
        {
            // Store and related resource routes
            Route::group(['prefix' => 'stores'], function ()
            {
                Route::get( '{store}', [JuasoonlineStoreController::class, 'getStore' ]);
                Route::get( '{store}/products', [JuasoonlineStoreController::class, 'getStoreProducts']);
                Route::get( '{store}/products/{product}/recommendations', [JuasoonlineStoreController::class, 'getStoreRecommendations']);
                Route::get( '{store}/products/top-selling', [JuasoonlineStoreController::class, 'getStoreTopSelling' ]);
                Route::get( '{store}/stats', [JuasoonlineStoreController::class, 'getStoreStats']);
            });

            // Product and related resource routes
            Route::group(['prefix' => 'products'], function ()
            {
                Route::get('', [JuasoonlineProductController::class, 'index']);
                Route::get('{product}', [JuasoonlineProductController::class, 'show']);
                Route::get('{product}/recommendations', [JuasoonlineProductController::class, 'getRecommendations']);
                Route::get('{product}/ordered', [JuasoonlineProductController::class, 'getOrdered']);

                Route::get('rankings/top-ranking', [JuasoonlineProductController::class, 'getTopRankings']);
            });

            // Ad routes
            Route::group(['prefix' => 'ads'], function ()
            {
                Route::get('slider-ads', [JuasoonlineAdController::class, 'sliderAds']);
                Route::get('quick-deals', [JuasoonlineAdController::class, 'quickDeals']);
            });
        });
    });
});
