<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MustBeAdministratorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()?->username != 'maide'){
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
