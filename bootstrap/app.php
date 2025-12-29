<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;




/*csrf  token*/


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'stripe/*',
            'webhook/*',
            'api/external/*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();





return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        
        $middleware->alias([
            'token' => \App\Http\Middleware\Token::class,
        ]);

        $middleware->alias([
            'checkage' => \App\Http\Middleware\CheckAge::class,
        ]);

                $middleware->alias([
            'role' => \App\Http\Middleware\Admin1::class,
        ]);

        $middleware->alias (["CheckIpLocal" => \App\Http\Middleware\CheckIpLocal::class]);

        $middleware->alias ([
            'BlockEmptyRequest' => \App\Http\Middleware\BlockEmptyRequest::class,]);
            
        
        $middleware->alias([
            'country' => \App\Http\Middleware\CheckCountry::class,
        ]);

        $middleware->alias ([
            'minlength' => \App\Http\Middleware\MinLength::class,]);

        $middleware->alias ([
            'isadmin' => \App\Http\Middleware\isadmin::class,]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
