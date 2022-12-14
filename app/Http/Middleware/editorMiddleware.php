<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class editorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->user()->role != 'editor' ) {
            return redirect()->route('dashboard')->withErrors('you don\'t have permission');
        }
        return $next($request);
    }
}
