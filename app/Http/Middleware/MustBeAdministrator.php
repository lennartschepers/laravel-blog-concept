<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MustBeAdministrator
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    //custom middleware that checks if user is authenticated as admin
    if (auth()->user()?->username != 'lennart') {
      abort(Response::HTTP_FORBIDDEN);
    }
    return $next($request);
  }
}
