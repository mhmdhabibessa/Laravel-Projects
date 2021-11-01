<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locales = config('app.locales');

        if (!array_key_exists($request->segment(1), $locales)) {
            $segments = $request->segments();
            array_unshift($segments, config('app.fallback_locale'));
            return redirect()->to(implode('/', $segments));
        }
//
        return $next($request);
    }
}
