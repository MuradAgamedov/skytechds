<?php

use App\Support\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (ModelNotFoundException $e, $request) {

            if ($request->is('api/*')) {

                if (config('app.debug')) {
                    return ApiResponse::error($e->getMessage(), 404);
                }

                return ApiResponse::error("Resource not found", 404);
            }
        });
        $exceptions->render(function (ValidationException $e, $request) {

            if ($request->is('api/*')) {

                if (config('app.debug')) {
                    return ApiResponse::validationError($e->errors(), 500);
                }

                return ApiResponse::error("Server error", 500);
            }
        });
        $exceptions->render(function (\Throwable $e, $request) {

            if ($request->is('api/*')) {

                if (config('app.debug')) {
                    return ApiResponse::error($e, 500);
                }

                return ApiResponse::error("Server error", 500);
            }
        });
    
    })->create();