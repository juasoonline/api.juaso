<?php

namespace App\Http\Controllers\Juasoonline\Resource\Customer\Wishlist;


use App\Http\Requests\Juasoonline\Resource\Customer\Wishlist\WishlistRequest;
use App\Repositories\Juasoonline\Resource\Customer\Wishlist\WishlistRepositoryInterface;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Models\Juasoonline\Resource\Customer\Wishlist\Wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class WishlistController extends Controller
{
    private $theRepository;

    /**
     * AddressController constructor.
     *
     * @param WishlistRepositoryInterface $wishlistRepository
     */
    public function __construct( WishlistRepositoryInterface $wishlistRepository )
    {
        $this -> theRepository = $wishlistRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Customer $customer
     * @return JsonResponse
     */
    public function index( Customer $customer ) : JsonResponse
    {
        return $this -> theRepository -> index( $customer );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Customer $customer
     * @param WishlistRequest $wishlistRequest
     * @return JsonResponse
     */
    public function store( Customer $customer, WishlistRequest $wishlistRequest ) : JsonResponse
    {
        return $this -> theRepository -> store( $customer, $wishlistRequest );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @param Wishlist $wishlist
     * @return JsonResponse
     */
    public function destroy( Customer $customer, Wishlist $wishlist ) : JsonResponse
    {
        return $this -> theRepository -> destroy( $customer, $wishlist );
    }
}
