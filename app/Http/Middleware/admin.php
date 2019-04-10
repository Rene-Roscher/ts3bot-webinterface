<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request as RequestAlias;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param RequestAlias $request
     * @param Closure $next
     * @return mixed
     * @throws BindingResolutionException
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        } else {
            if(!$request->user()->hasRole('ADMIN')) {
                return redirect()->guest('login');
            }
        }
        return $next($request);
    }
}
