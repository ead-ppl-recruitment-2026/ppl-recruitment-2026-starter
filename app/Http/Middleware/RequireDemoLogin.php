<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireDemoLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->has('demo_user_id')) {
            return to_route('login')->with('notice', 'Silakan masuk memakai akun demo untuk membuka workspace.');
        }

        return $next($request);
    }
}
