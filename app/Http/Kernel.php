<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...existing code...

    protected $routeMiddleware = [
        // ...existing code...
        'CheckRole' => \App\Http\Middleware\CheckRole::class,
    ];

    // ...existing code...
}
