<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenAuthOrNotAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            // do whatever you want to do if a token is expired
            return $next($request);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            // do whatever you want to do if a token is invalid
            return $next($request);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            // do whatever you want to do if a token is not present
            return $next($request);
        }
    }
}
