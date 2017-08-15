<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class CheckWaiterOrder
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
        $user = \Auth::user();

        if (is_null($user->orders()->where('id', '=', $request->route('id'))->first())) {
            Log::alert('User ' . $user->username . ' was tried to access someone else\'s order');
            abort(403, 'This order is served by another waiter');
        }

        return $next($request);
    }
}
