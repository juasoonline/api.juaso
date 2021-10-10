<?php

namespace App\Repositories\Juasoonline\Resource\Customer\Wishlist;

use App\Http\Requests\Juasoonline\Resource\Customer\Wishlist\WishlistRequest;
use App\Models\Business\Resource\Product\Product\Product;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Models\Juasoonline\Resource\Customer\Wishlist\Wishlist;

use Illuminate\Http\JsonResponse;

interface WishlistRepositoryInterface
{
    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function index( Customer $customer ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param WishlistRequest $wishlistRequest
     * @return JsonResponse
     */
    public function store( Customer $customer, WishlistRequest $wishlistRequest ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param Product $product
     * @return JsonResponse
     */
    public function checkList( Customer $customer, Product $product ) : JsonResponse;

    /**
     * @param Customer $customer
     * @param Wishlist $wishlist
     * @return JsonResponse
     */
    public function destroy( Customer $customer, Wishlist $wishlist ) : JsonResponse;
}
