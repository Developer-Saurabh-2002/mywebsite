<?php

namespace App\Http\Middleware;

use Closure;

class AuthCheckMiddleware
{
  public function handle($request, Closure $next, ...$roles)
  {
    if (!auth()->check()) {
      return redirect('/')->with('error', 'Unauthorized access');
    }

    if (empty($roles)) {
      return $next($request);
    }
    foreach ($roles as $role) {
      if ($request->user()->usertype == $role) {
        return $next($request);
      }
    }
    return redirect('/dashboard')->with('error', 'Unauthorized access');
  }
}
