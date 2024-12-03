<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentSecurityPolicy
{
    public function handle(Request $request, Closure $next)
    {
        // Add the CSP header allowing Stripe and blob URLs
        $response = $next($request);
        $response->headers->set('Content-Security-Policy', "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://js.stripe.com blob:; object-src 'none';");

        return $response;
    }
}
