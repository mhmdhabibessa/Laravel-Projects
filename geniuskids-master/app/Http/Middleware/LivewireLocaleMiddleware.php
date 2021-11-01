<?php

namespace App\Http\Middleware;

use Closure;

class LivewireLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $livewireLocale = $request->get('data')['livewireLocale'] ?? null;

        if($livewireLocale){
            if (in_array($livewireLocale, ['de', 'ar'])) {
                app()->setLocale($livewireLocale);
                session()->put('locale', $livewireLocale);
            }
        }
        return $next($request);
    }
}
