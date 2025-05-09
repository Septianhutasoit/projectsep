<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
    /**
     * Check if the logged in user is an administrator.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable|null  $user
     * @return bool
     */
    private function checkIfUserIsAdmin($user)
    {
        // Sesuaikan dengan field admin di database kamu
        // Misal di tabel users ada kolom 'is_admin'
        return ($user && $user->is_admin == 1);
    }

    /**
     * Answer to unauthorized access request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    private function respondToUnauthorizedRequest($request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect()->route('login'); // arahkan ke route login default
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return $this->respondToUnauthorizedRequest($request);
        }

        if (!$this->checkIfUserIsAdmin(Auth::user())) {
            return $this->respondToUnauthorizedRequest($request);
        }

        return $next($request);
    }
}
