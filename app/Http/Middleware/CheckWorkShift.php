<?php

namespace App\Http\Middleware;

use App\Model\WorkShift;
use Closure;

class CheckWorkShift
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $workshift = WorkShift::where('active', '=', true)->first();

        if (is_null($workshift)) {
            \Auth::logout();
            \Session::flush();
            return redirect()->route('login')->with('message' , 'Work Shift is not open');
        }

        return $next($request);

    }
}
