<?php

namespace App\Traits;

use App\Http\Resources\Juasoonline\Resource\Customer\Customer\CustomerLoginResource;
use App\Http\Resources\Business\Resource\Store\Administrator\AdministratorResource;

use App\Http\Requests\UserLoginRequest;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait AuthenticatesJwtUsers
{
    private $guard_name = null;

    /**
     * @param UserLoginRequest $userLoginRequest
     * @return JsonResponse
     */
    public function login( UserLoginRequest $userLoginRequest ) : JsonResponse
    {
        $token = guard( $this -> guard_name ) -> attempt( $userLoginRequest -> validated() ['data']['attributes'] );
        if ( $token ) { return $this -> respondWithToken( $token, $this -> getResource() ); }
        return $this -> errorResponse ( null, "Failed", "Authentication failed", Response::HTTP_UNAUTHORIZED );
    }

    /**
     * @param string $token
     * @param array $resource
     * @return JsonResponse
     */
    public function respondWithToken( string $token, array $resource ) : JsonResponse
    {
        $resource[ 'data' ] = array_merge
        (
            $resource[ 'data' ],
            [
                'token' =>
                [
                    'token_type' => 'bearer',
//                    'expires' => guard( $this -> guard_name ) -> factory() -> getTTL() * 100000,
                    'access_token' => $token
                ]
            ]
        );
        return response() -> json( $resource, 200 );
    }

    /**
     * Refresh a token.
     * @return JsonResponse
     */
    public function refresh() : JsonResponse
    {
        return $this -> respondWithToken( guard( $this -> guard_name ) -> refresh(), $this -> getResource() );
    }

    /**
     * Log the user out (Invalidate the token).
     * @return JsonResponse|mixed
     */
    public function logout() : JsonResponse
    {
        guard( $this -> guard_name ) -> logout();
        return $this -> successResponse ( null, "Success", "Logged out", Response::HTTP_OK );
    }

    /**
     * @param string|null $name
     * @return string
     */
    public function setGuardName( string $name = null ) : string
    {
        return $this -> guard_name = $name;
    }

    /**
     * @return array|mixed
     */
    public function getResource() : array
    {
        $user = auth( $this -> guard_name ) -> user();


        if ( $this -> guard_name === 'customer' )
        {
            return [ 'data' => ( new CustomerLoginResource( $user ) ) -> toArray( request() ) ];
        }

        elseif ( $this -> guard_name === 'store_administrator' )
        {
            return [ 'data' => ( new AdministratorResource( $user ) ) -> toArray( request() ) ];
        }
    }
}
