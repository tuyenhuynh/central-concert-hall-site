<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        $user  = $request->user();
        if($user && $user->isAdmin() && $user->is_active) {
            return $next($request);
        }
        return redirect("/index");
    }
}
