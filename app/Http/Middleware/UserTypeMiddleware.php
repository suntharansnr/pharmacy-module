<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$userTypes): Response
    {
        $user = Auth::user();

        //if user is not logged in redirect to login page
        if (!$user) {
            return redirect()->route('login');
        }

        foreach ($userTypes as $userType) {
            if ($user->user_type == $userType) {
                return $next($request);
            }
        }

        return abort(403);
    }
}
