<?php

namespace DiabloDB\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Administrator
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request Request object.
     * @param \Closure                 $next    Closure.
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }

        $user = $this->auth->user();
        if (!$user->isAdmin()) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
