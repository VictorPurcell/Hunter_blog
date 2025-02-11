<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // Verifica se o usuário está autenticado
    if (!Auth::check()) {
        return redirect('/login')->with('error', 'Você precisa estar logado para acessar esta página.');
    }

    // Verifica se o usuário completou o 2FA
    if (!session()->has('duo_verified') || !session('duo_verified')) {
        return redirect()->route('duo.initiate');
    }

    return $next($request);
    }
}
