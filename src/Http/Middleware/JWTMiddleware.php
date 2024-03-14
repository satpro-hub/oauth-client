<?php

namespace Satpro\JWTClient\Http\Middleware;

use Closure;
use Satpro\JWTClient\JWTClient;

class JWTMiddleware
{
    public function handle($request, Closure $next, ...$scopes)
    {
        $authorization_h = $request->header('authorization') ?? null;
        $is_validated = JWTClient::validateToken($authorization_h);
        if ($is_validated && empty(JWTClient::$validationErrors)) {
            $request->attributes->set('payload', JWTClient::getPayload());
            return $next($request);
        } else {
            return response()->json(["success" => false, "errors" => JWTClient::$validationErrors], 401);
        }
    }

}
