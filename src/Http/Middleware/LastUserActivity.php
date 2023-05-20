<?php

namespace Atin\LaravelUserOnline\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LastUserActivity
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (
            auth()->check()
            && cache()->add('users.online.' . auth()->user()->id, true, now()->addSeconds(config('laravel-user-online.ttl')))
        ) {
            auth()->user()->last_seen_at = now();
            auth()->user()->save();
        }

        return $next($request);
    }
}
