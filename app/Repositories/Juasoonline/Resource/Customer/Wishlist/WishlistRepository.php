<?php

namespace App\Repositories\Juasoonline\Resource\Customer\Wishlist;

use App\Http\Requests\Juasoonline\Resource\Customer\Wishlist\WishlistRequest;
use App\Http\Resources\Juasoonline\Resource\Customer\Wishlist\WishlistResource;
use App\Jobs\Juasoonline\Resource\Customer\Wishlist\CreateWishlist;
use App\Jobs\Juasoonline\Resource\Customer\Wishlist\UpdateWishlist;
use App\Models\Juasoonline\Resource\Customer\Customer\Customer;
use App\Models\Juasoonline\Resource\Customer\Wishlist\Wishlist;

use App\Traits\apiResponseBuilder;
use App\Traits\Relatives;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class WishlistRepository implements WishlistRepositoryInterface
{
    use apiResponseBuilder, Relatives;

    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function index( Customer $customer ) : JsonResponse
    {
        return $this -> successResponse( WishlistResource::collection( $customer -> wishlists() -> paginate() ), "Success", null, Response::HTTP_OK );
    }

    /**
     * @param Customer $customer
     * @param WishlistRequest $wishlistRequest
     * @return JsonResponse
     */
    public function store( Customer $customer, WishlistRequest $wishlistRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateWishlist( $customer, $wishlistRequest ) ) -> handle(), "Success", "Item added to wishlist", Response::HTTP_CREATED );
    }

    /**
     * @param Customer $customer
     * @param Wishlist $wishlist
     * @return JsonResponse
     */
    public function destroy( Customer $customer, Wishlist $wishlist ) : JsonResponse
    {
        checkResourceRelation( $customer -> wishlists() -> where( 'wishlists.id', $wishlist -> id ) -> count());
        try
        {
            $wishlist -> delete();
            return $this -> successResponse( null, 'Success', 'Wishlist item deleted', Response::HTTP_NO_CONTENT );
        }
        catch ( Exception $exception )
        {
            report( $exception );
            return $this -> errorResponse( null, 'Error', 'Service is unavailable, please retry again later.', Response::HTTP_SERVICE_UNAVAILABLE );
        }
    }
}
