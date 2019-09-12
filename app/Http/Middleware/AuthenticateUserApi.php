<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 9/6/19
 * Time: 4:18 PM
 */

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateUserApi extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {

        if (!$request->header('apiToken')) {
            $errorResponse = ['status' => -1, 'message' => 'Api Token doesn\'t exist'];
            return response(json_encode($errorResponse), 401);
        }
        $apiToken = $request->header('apiToken');
        $user = User::where('api_token', $apiToken)->first();
        if (!$user) {
            return response('Invalid User', 401);
        }
        Auth::login($user);
        return $next($request);
    }
}
