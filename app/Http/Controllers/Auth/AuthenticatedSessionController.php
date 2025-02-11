<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public const HOME = '/home';

    public function create(): View
    {
        return view('auth.login');
    }
    /**
    * Retorna o campo que será utilizado para login.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }


    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();

        if (!$user) {
            return back()->withErrors(['login' => 'Credenciais inválidas, tente novamente.']);
        }

        session(['duo_user_id' => $user->id]);

        return redirect()->route('duo.initiate');
    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
