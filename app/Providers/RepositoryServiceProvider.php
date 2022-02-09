<?php

namespace App\Providers;

// Juaso main resources
use App\Repositories\Juaso\Resource\Country\CountryRepositoryInterface;
use App\Repositories\Juaso\Resource\Country\CountryRepository;
use App\Repositories\Juaso\Resource\Variant\Brand\BrandRepositoryInterface;
use App\Repositories\Juaso\Resource\Variant\Brand\BrandRepository;
use App\Repositories\Juaso\Resource\Tag\TagRepositoryInterface;
use App\Repositories\Juaso\Resource\Tag\TagRepository;
use App\Repositories\Juaso\Resource\DeliveryMethod\DeliveryMethodRepository;
use App\Repositories\Juaso\Resource\DeliveryMethod\DeliveryMethodRepositoryInterface;
use App\Repositories\Juaso\Resource\PaymentMethod\PaymentMethodRepository;
use App\Repositories\Juaso\Resource\PaymentMethod\PaymentMethodRepositoryInterface;
use App\Repositories\Juaso\Resource\Group\Group\GroupRepositoryInterface;
use App\Repositories\Juaso\Resource\Group\Group\GroupRepository;
use App\Repositories\Juaso\Resource\Group\Category\CategoryRepositoryInterface;
use App\Repositories\Juaso\Resource\Group\Category\CategoryRepository;
use App\Repositories\Juaso\Resource\Group\Subcategory\SubcategoryRepositoryInterface;
use App\Repositories\Juaso\Resource\Group\Subcategory\SubcategoryRepository;
use App\Repositories\Juaso\Resource\Subscription\SubscriptionRepositoryInterface;
use App\Repositories\Juaso\Resource\Subscription\SubscriptionRepository;
use App\Repositories\Juaso\Resource\Shipper\Shipper\ShipperRepositoryInterface;
use App\Repositories\Juaso\Resource\Shipper\Shipper\ShipperRepository;
use App\Repositories\Juaso\Resource\Shipper\Agent\AgentRepositoryInterface;
use App\Repositories\Juaso\Resource\Shipper\Agent\AgentRepository;
use App\Repositories\Juaso\Resource\Shipper\Transport\TransportRepository;
use App\Repositories\Juaso\Resource\Shipper\Transport\TransportRepositoryInterface;

// Business main resources
use App\Repositories\Business\Resource\Store\Store\StoreRepositoryInterface;
use App\Repositories\Business\Resource\Store\Store\StoreRepository;
use App\Repositories\Business\Resource\Store\Administrator\AdministratorRepositoryInterface;
use App\Repositories\Business\Resource\Store\Administrator\AdministratorRepository;
use App\Repositories\Business\Resource\Store\Branch\BranchRepositoryInterface;
use App\Repositories\Business\Resource\Store\Branch\BranchRepository;
use App\Repositories\Business\Resource\Store\Charge\ChargeRepositoryInterface;
use App\Repositories\Business\Resource\Store\Charge\ChargeRepository;
use App\Repositories\Business\Resource\Store\Review\ReviewRepositoryInterface as StoreReviewRepositoryInterface;
use App\Repositories\Business\Resource\Store\Review\ReviewRepository as StoreReviewRepository;
use App\Repositories\Business\Resource\Store\Follower\FollowerRepository;
use App\Repositories\Business\Resource\Store\Follower\FollowerRepositoryInterface;
use App\Repositories\Business\Resource\Store\Category\Category\CategoryRepositoryInterface as StoreCategoryRepositoryInterface;
use App\Repositories\Business\Resource\Store\Category\Category\CategoryRepository as StoreCategoryRepository;
use App\Repositories\Business\Resource\Store\Category\Subcategory\SubcategoryRepositoryInterface as StoreSubcategoryRepositoryInterface;
use App\Repositories\Business\Resource\Store\Category\Subcategory\SubcategoryRepository as StoreSubcategoryRepository;
use App\Repositories\Business\Resource\Store\Slider\SliderRepositoryInterface;
use App\Repositories\Business\Resource\Store\Slider\SliderRepository;
use App\Repositories\Business\Resource\Store\Coupon\CouponRepositoryInterface;
use App\Repositories\Business\Resource\Store\Coupon\CouponRepository;
use App\Repositories\Business\Resource\Product\Product\ProductRepositoryInterface;
use App\Repositories\Business\Resource\Product\Product\ProductRepository;
use App\Repositories\Business\Resource\Product\Image\ImageRepositoryInterface;
use App\Repositories\Business\Resource\Product\Image\ImageRepository;
use App\Repositories\Business\Resource\Product\Color\ColorRepositoryInterface;
use App\Repositories\Business\Resource\Product\Color\ColorRepository;
use App\Repositories\Business\Resource\Product\Size\SizeRepositoryInterface;
use App\Repositories\Business\Resource\Product\Size\SizeRepository;
use App\Repositories\Business\Resource\Product\Specification\SpecificationRepositoryInterface;
use App\Repositories\Business\Resource\Product\Specification\SpecificationRepository;
use App\Repositories\Business\Resource\Product\Overview\OverviewRepositoryInterface;
use App\Repositories\Business\Resource\Product\Overview\OverviewRepository;
use App\Repositories\Business\Resource\Product\Review\ReviewRepositoryInterface;
use App\Repositories\Business\Resource\Product\Review\ReviewRepository;
use App\Repositories\Business\Resource\Product\Faq\FaqRepositoryInterface;
use App\Repositories\Business\Resource\Product\Faq\FaqRepository;
use App\Repositories\Business\Resource\Product\Bundle\BundleRepositoryInterface;
use App\Repositories\Business\Resource\Product\Bundle\BundleRepository;


// Juasoonline main resources
use App\Repositories\Juasoonline\Resource\Customer\Customer\CustomerRepositoryInterface;
use App\Repositories\Juasoonline\Resource\Customer\Customer\CustomerRepository;
use App\Repositories\Juasoonline\Resource\Customer\Address\AddressRepositoryInterface;
use App\Repositories\Juasoonline\Resource\Customer\Address\AddressRepository;
use App\Repositories\Juasoonline\Resource\Customer\Wishlist\WishlistRepositoryInterface;
use App\Repositories\Juasoonline\Resource\Customer\Wishlist\WishlistRepository;
use App\Repositories\Juasoonline\Resource\Customer\Cart\CartRepositoryInterface;
use App\Repositories\Juasoonline\Resource\Customer\Cart\CartRepository;
use App\Repositories\Juasoonline\Resource\Customer\Order\OrderRepositoryInterface;
use App\Repositories\Juasoonline\Resource\Customer\Order\OrderRepository;
use App\Repositories\Juasoonline\Resource\Customer\Store\CustomerStoreRepositoryInterface;
use App\Repositories\Juasoonline\Resource\Customer\Store\CustomerStoreRepository;

// Juaso in Juasoonline resources
use App\Repositories\Juasoonline\Juaso\Country\JuasoonlineCountryRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Country\JuasoonlineCountryRepository;
use App\Repositories\Juasoonline\Juaso\Variant\Brand\JuasoonlineBrandRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Variant\Brand\JuasoonlineBrandRepository;
use App\Repositories\Juasoonline\Juaso\Group\Group\JuasoonlineGroupRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Group\Group\JuasoonlineGroupRepository;
use App\Repositories\Juasoonline\Juaso\Group\Category\JuasoonlineCategoryRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Group\Category\JuasoonlineCategoryRepository;
use App\Repositories\Juasoonline\Juaso\Group\Subcategory\JuasoonlineSubcategoryRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Group\Subcategory\JuasoonlineSubcategoryRepository;
use App\Repositories\Juasoonline\Juaso\PaymentMethod\JuasoonlinePaymentMethodRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\PaymentMethod\JuasoonlinePaymentMethodRepository;
use App\Repositories\Juasoonline\Juaso\DeliveryMethod\JuasoonlineDeliveryMethodRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\DeliveryMethod\JuasoonlineDeliveryMethodRepository;
use App\Repositories\Juasoonline\Juaso\Sale\Sale\JuasoonlineSaleRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Sale\Sale\JuasoonlineSaleRepository;
use App\Repositories\Juasoonline\Juaso\Slider\JuasoonlineSliderRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Slider\JuasoonlineSliderRepository;
use App\Repositories\Juasoonline\Juaso\Banner\JuasoonlineBannerRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Banner\JuasoonlineBannerRepository;
use App\Repositories\Juasoonline\Juaso\Sale\BlackFriday\JuasoonlineBlackFridayRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Sale\BlackFriday\JuasoonlineBlackFridayRepository;
use App\Repositories\Juasoonline\Juaso\Sale\ChristmasSale\JuasoonlineChristmasSaleRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Sale\ChristmasSale\JuasoonlineChristmasSaleRepository;
use App\Repositories\Juasoonline\Juaso\Sale\EasterSale\JuasoonlineEasterSaleRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Sale\EasterSale\JuasoonlineEasterSaleRepository;
use App\Repositories\Juasoonline\Juaso\Sale\AnniversarySale\JuasoonlineAnniversarySaleRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Sale\AnniversarySale\JuasoonlineAnniversarySaleRepository;
use App\Repositories\Juasoonline\Juaso\Sale\CyberMondaySale\JuasoonlineCyberMondaySaleRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Sale\CyberMondaySale\JuasoonlineCyberMondaySaleRepository;
use App\Repositories\Juasoonline\Juaso\Campaign\FlashDeal\JuasoonlineFlashDealRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Campaign\FlashDeal\JuasoonlineFlashDealRepository;
use App\Repositories\Juasoonline\Juaso\Campaign\WeeklyDeal\JuasoonlineWeeklyDealRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Campaign\WeeklyDeal\JuasoonlineWeeklyDealRepository;
use App\Repositories\Juasoonline\Juaso\Campaign\NewArrival\JuasoonlineNewArrivalRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Campaign\NewArrival\JuasoonlineNewArrivalRepository;
use App\Repositories\Juasoonline\Juaso\Campaign\TopRanking\JuasoonlineTopRankingRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Campaign\TopRanking\JuasoonlineTopRankingRepository;
use App\Repositories\Juasoonline\Juaso\Campaign\FeaturedCategory\JuasoonlineFeaturedCategoryRepositoryInterface;
use App\Repositories\Juasoonline\Juaso\Campaign\FeaturedCategory\JuasoonlineFeaturedCategoryRepository;

// Business in Juasoonline resources
use App\Repositories\Juasoonline\Business\Store\JuasoonlineStoresRepositoryInterface;
use App\Repositories\Juasoonline\Business\Store\JuasoonlineStoresRepository;
use App\Repositories\Juasoonline\Business\Product\JuasoonlineProductsRepositoryInterface;
use App\Repositories\Juasoonline\Business\Product\JuasoonlineProductsRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        // Juaso main resources
        $this -> app -> bind( CountryRepositoryInterface::class, CountryRepository::class );
        $this -> app -> bind( BrandRepositoryInterface::class, BrandRepository::class );
        $this -> app -> bind( TagRepositoryInterface::class, TagRepository::class );
        $this -> app -> bind( GroupRepositoryInterface::class, GroupRepository::class );
        $this -> app -> bind( CategoryRepositoryInterface::class, CategoryRepository::class );
        $this -> app -> bind( SubcategoryRepositoryInterface::class, SubcategoryRepository::class );
        $this -> app -> bind( SubscriptionRepositoryInterface::class, SubscriptionRepository::class );
        $this -> app -> bind( PaymentMethodRepositoryInterface::class, PaymentMethodRepository::class );
        $this -> app -> bind( DeliveryMethodRepositoryInterface::class, DeliveryMethodRepository::class );
        $this -> app -> bind( ShipperRepositoryInterface::class, ShipperRepository::class );
        $this -> app -> bind( AgentRepositoryInterface::class, AgentRepository::class );
        $this -> app -> bind( TransportRepositoryInterface::class, TransportRepository::class );

        // Business main resources
        $this -> app -> bind( StoreRepositoryInterface::class, StoreRepository::class );
        $this -> app -> bind( AdministratorRepositoryInterface::class, AdministratorRepository::class );
        $this -> app -> bind( BranchRepositoryInterface::class, BranchRepository::class );
        $this -> app -> bind( ChargeRepositoryInterface::class, ChargeRepository::class );
        $this -> app -> bind( StoreReviewRepositoryInterface::class, StoreReviewRepository::class );
        $this -> app -> bind( FollowerRepositoryInterface::class, FollowerRepository::class );
        $this -> app -> bind( StoreCategoryRepositoryInterface::class, StoreCategoryRepository::class );
        $this -> app -> bind( StoreSubcategoryRepositoryInterface::class, StoreSubcategoryRepository::class );
        $this -> app -> bind( SliderRepositoryInterface::class, SliderRepository::class );
        $this -> app -> bind( CouponRepositoryInterface::class, CouponRepository::class );
        $this -> app -> bind( ProductRepositoryInterface::class, ProductRepository::class );
        $this -> app -> bind( ImageRepositoryInterface::class, ImageRepository::class );
        $this -> app -> bind( SpecificationRepositoryInterface::class, SpecificationRepository::class );
        $this -> app -> bind( ColorRepositoryInterface::class, ColorRepository::class );
        $this -> app -> bind( SizeRepositoryInterface::class, SizeRepository::class );
        $this -> app -> bind( OverviewRepositoryInterface::class, OverviewRepository::class );
        $this -> app -> bind( FaqRepositoryInterface::class, FaqRepository::class );
        $this -> app -> bind( ReviewRepositoryInterface::class, ReviewRepository::class );
        $this -> app -> bind( BundleRepositoryInterface::class, BundleRepository::class );


        // Juasoonline main resources
        $this -> app -> bind( CustomerRepositoryInterface::class, CustomerRepository::class );
        $this -> app -> bind( AddressRepositoryInterface::class, AddressRepository::class );
        $this -> app -> bind( WishlistRepositoryInterface::class, WishlistRepository::class );
        $this -> app -> bind( CartRepositoryInterface::class, CartRepository::class );
        $this -> app -> bind( OrderRepositoryInterface::class, OrderRepository::class );
        $this -> app -> bind( CustomerStoreRepositoryInterface::class, CustomerStoreRepository::class );

        // Juaso in Juasoonline resources
        $this -> app -> bind( JuasoonlineCountryRepositoryInterface::class, JuasoonlineCountryRepository::class );
        $this -> app -> bind( JuasoonlineBrandRepositoryInterface::class, JuasoonlineBrandRepository::class );
        $this -> app -> bind( JuasoonlineGroupRepositoryInterface::class, JuasoonlineGroupRepository::class );
        $this -> app -> bind( JuasoonlineCategoryRepositoryInterface::class, JuasoonlineCategoryRepository::class );
        $this -> app -> bind( JuasoonlineSubcategoryRepositoryInterface::class, JuasoonlineSubcategoryRepository::class );
        $this -> app -> bind( JuasoonlinePaymentMethodRepositoryInterface::class, JuasoonlinePaymentMethodRepository::class );

        $this -> app -> bind( JuasoonlineDeliveryMethodRepositoryInterface::class, JuasoonlineDeliveryMethodRepository::class );
        $this -> app -> bind( JuasoonlineSaleRepositoryInterface::class, JuasoonlineSaleRepository::class );
        $this -> app -> bind( JuasoonlineBlackFridayRepositoryInterface::class, JuasoonlineBlackFridayRepository::class );
        $this -> app -> bind( JuasoonlineChristmasSaleRepositoryInterface::class, JuasoonlineChristmasSaleRepository::class );
        $this -> app -> bind( JuasoonlineEasterSaleRepositoryInterface::class, JuasoonlineEasterSaleRepository::class );
        $this -> app -> bind( JuasoonlineAnniversarySaleRepositoryInterface::class, JuasoonlineAnniversarySaleRepository::class );
        $this -> app -> bind( JuasoonlineCyberMondaySaleRepositoryInterface::class, JuasoonlineCyberMondaySaleRepository::class );

        $this -> app -> bind( JuasoonlineFlashDealRepositoryInterface::class, JuasoonlineFlashDealRepository::class );
        $this -> app -> bind( JuasoonlineWeeklyDealRepositoryInterface::class, JuasoonlineWeeklyDealRepository::class );
        $this -> app -> bind( JuasoonlineNewArrivalRepositoryInterface::class, JuasoonlineNewArrivalRepository::class );
        $this -> app -> bind( JuasoonlineTopRankingRepositoryInterface::class, JuasoonlineTopRankingRepository::class );
        $this -> app -> bind( JuasoonlineFeaturedCategoryRepositoryInterface::class, JuasoonlineFeaturedCategoryRepository::class );
        $this -> app -> bind( JuasoonlineSliderRepositoryInterface::class, JuasoonlineSliderRepository::class );
        $this -> app -> bind( JuasoonlineBannerRepositoryInterface::class, JuasoonlineBannerRepository::class );

        // Business in Juasoonline resources
        $this -> app -> bind( JuasoonlineStoresRepositoryInterface::class, JuasoonlineStoresRepository::class );
        $this -> app -> bind( JuasoonlineProductsRepositoryInterface::class, JuasoonlineProductsRepository::class );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
