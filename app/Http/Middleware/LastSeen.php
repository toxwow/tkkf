<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LastSeen
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
        if (!Auth::check()) {
            return $next($request);
        }
        $expiresAt = Carbon::now()->addMinutes(2);
        Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);

        $user = Auth::user();
        $user->last_seen = new \DateTime();
        $user->save();

        return $next($request);
    }
}
