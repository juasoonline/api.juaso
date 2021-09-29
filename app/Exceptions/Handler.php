<?php

namespace App\Exceptions;

use App\Traits\apiResponseBuilder;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use apiResponseBuilder;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * @param Request $request
     * @param Throwable $exception
     * @return JsonResponse|Response
     * @throws Throwable
     */
    public function render( $request, $exception )
    {
        if ( $exception instanceof ModelNotFoundException && $request -> wantsJson())
        {
            return $this -> errorResponse( null, 'Error', 'Resource not found', Response::HTTP_NOT_FOUND );
        }
        elseif ( $exception instanceof MethodNotAllowedHttpException )
        {
            return $this -> errorResponse( null, 'Error', 'You do not have permission to perform this action', Response::HTTP_METHOD_NOT_ALLOWED );
        }
        elseif ( $exception instanceof NotFoundHttpException )
        {
            return $this -> errorResponse( null, 'Error', 'Resource not found', Response::HTTP_NOT_FOUND );
        }
        elseif ( $exception instanceof QueryException )
        {
            return $this -> errorResponse( null, 'Error', 'Connection refused', Response::HTTP_UNAUTHORIZED );
        }
        elseif ( $exception instanceof RelationNotFoundException )
        {
            return $this -> errorResponse( null, 'Error', 'Undefined relationship', Response::HTTP_INTERNAL_SERVER_ERROR );
        }

        return parent::render( $request, $exception );
    }

    /**
     * @param Request $request
     * @param AuthenticationException $exception
     * @return JsonResponse|RedirectResponse|Response
     * @throws Throwable
     */
    protected function unauthenticated($request, AuthenticationException $exception )
    {
        if ( $request -> expectsJson() )
        {
            return $this -> errorResponse( null, 'Error', 'User not authenticated', Response::HTTP_UNAUTHORIZED );
        }
        return redirect() -> guest('login');
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this -> reportable( function ( Throwable $e )
        {
            //
        });
    }
}
