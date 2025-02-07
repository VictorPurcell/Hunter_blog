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

        $request->validate([
            'username' => ['required', 'string'], // Alterado de email para username
            'password' => ['required', 'string'],
            ]);

        // Tente autenticar utilizando 'username'
        if (! Auth::attempt($request->only('username', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'username' => 'As credenciais fornecidas não correspondem aos nossos registros.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
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
