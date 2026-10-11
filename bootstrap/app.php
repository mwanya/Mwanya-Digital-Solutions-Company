<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Load global helpers (e.g. setting()) directly, rather than relying on
// Composer's "autoload.files" list — that list is only rebuilt when
// `composer dump-autoload` is run, which is easy to forget after updating
// project files. Requiring it here guarantees it's always available.
require_once __DIR__.'/../app/helpers.php';

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
        ]);

        $middleware->appendToGroup('web', \App\Http\Middleware\TrackPageView::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
