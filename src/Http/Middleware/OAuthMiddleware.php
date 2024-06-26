<?php

namespace Satpro\OAuthClient\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Satpro\OAuthClient\OAuthClient;
use Satpro\OAuthClient\OAuthClientError;
use Satpro\OAuthClient\OAuthUser;

class OAuthMiddleware
{
    public function handle($request, Closure $next, ...$scopes)
    {
        $authorization_h = $request->header('authorization') ?? null;
        $is_validated = OAuthClient::validateToken($authorization_h);

        if ($request->session()->missing('X-User-Session-Id')) {
            $request->session()->put('X-User-Session-Id', Str::uuid()->toString());
        }
        if ($is_validated && empty(OAuthClientError::$validationErrors)) {
            //Auth::login(new OAuthUser(OAuthClient::getPayload()));;
            $request->attributes->set('payload', OAuthClient::getPayload());
            return $next($request);
        } else {
            return response()->json(["success" => false, "errors" => OAuthClientError::$validationErrors], 401);
        }
    }

}
