<?php

namespace App\Http\Middleware;

use Closure;

class CheckWaiter
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

        if ( $request->user()->role->role != 'waiter') {
            abort(403, 'Only waiters can enter to this section');
        }

        return $next($request);
    }
}
