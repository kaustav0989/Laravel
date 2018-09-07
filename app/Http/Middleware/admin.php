<?php

namespace App\Http\Middleware;

use Closure;

use Session;
use Auth;

class admin
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
        
        if( !Auth::user()->admin )
        {
            Session::flash('info','You have no permission to do that');
            return redirect()->back();
        }
        return $next($request);
    }
}
