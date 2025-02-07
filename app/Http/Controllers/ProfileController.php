<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User; // Certifique-se de que o caminho do modelo está correto
use App\Models\Comment;
use app\Models\Blog;

class ProfileController extends Controller
{
    // Mostrar o perfil do usuário
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = auth()->user(); // Obtém o usuário logado

        return view('profile.show', ['user' => Auth::user()]);
    }

    // Atualizar as informações do perfil

public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . auth()->id(),
        'address' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Recupera o usuário atual
    $user = User::find(auth()->id());

    // Atualiza os campos do usuário
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->address = $request->input('address');

    // Processa o upload da foto
    if ($request->hasFile('photo')) {
        // Remove a foto antiga, se existir
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        // Salva a nova foto
        $path = $request->file('photo')->store('profile_photos', 'public');
        $user->photo = $path;
    }

    // Salva as alterações no banco de dados
    $user->save();

    return redirect()->route('profile.update')->with('success', 'Perfil atualizado com sucesso!');
}

public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
