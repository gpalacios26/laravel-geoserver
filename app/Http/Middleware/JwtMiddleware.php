<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $exception) {
            if ($exception instanceof TokenInvalidException) {
                return response()->json(['status' => 'El Token es inválido']);
            } else if ($exception instanceof TokenExpiredException) {
                return response()->json(['status' => 'El Token está expirado']);
            } else {
                return response()->json(['status' => 'Authorization Token no encontrado']);
            }
        }
        return $next($request);
    }
}
