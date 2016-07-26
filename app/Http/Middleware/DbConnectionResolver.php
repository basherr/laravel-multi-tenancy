<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;
use Orchestra\Support\Facades\Tenanti;

class DbConnectionResolver
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
        $sites = Auth::user()->sites;
        if(count($sites) > 1) {
            return 'Please choose from company';
        }

        Tenanti::driver('mu')->asDefaultConnection( $sites[0], 'mybuild_{id}');
       
        return $next($request);
    }
}
