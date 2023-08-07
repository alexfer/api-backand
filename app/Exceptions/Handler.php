<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.     
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    */

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  Throwable $exception
     * @return void
     * @throws Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Throwable $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if (parse_url(env('APP_API_DOMAIN'), PHP_URL_HOST) == $request->server('HTTP_HOST')) {
            if ($exception instanceof AuthenticationException) {
                return response()->json([
                            'error' => $exception->getMessage(),
                            'status_code' => 401,
                                ], 401);
            }
            if ($exception instanceof NotFoundHttpException) {
                return response()->json([
                            'error' => sprintf('The URL [%s] you requested was not found.', $request->url()),
                            'status_code' => 404,
                                ], 404);
            }

            if ($exception instanceof MethodNotAllowedHttpException) {
                return response()->json([
                            'error' => sprintf('Method [%s] is not allowed for the requested route.', $request->method()),
                            'status_code' => 405,
                                ], 405);
            }
        }

        return parent::render($request, $exception);
    }
    
}
