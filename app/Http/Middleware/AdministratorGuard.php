<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdministratorGuard
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next)
    {
        if ( guard( 'administrator' ) -> check() ) { return $next( $request ); }
        return redirect() -> route('login');
    }
}
