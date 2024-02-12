<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * 1 = Admin
         * 2 = Logistica
         * 3 = Contabilidad
         */
        if(auth()->check())
        {
            if(auth()->user()->rol_id === 1)
            {
                return $next($request);
            }
        }

        return redirect()->to('/denied');
    }
}
