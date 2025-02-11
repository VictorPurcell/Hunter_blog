<?php

use App\Models\User;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\DuoAuthController;
use App\Http\Controllers\DuoController;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/duo/initiate', [DuoController::class, 'initiateDuo']);
    Route::post('/duo/verify', [DuoController::class, 'verifyDuo']);
    Route::get('/dashboard', function () {
        return response()->json(['message' => 'Bem-vindo ao painel!']);
    });
});
Route::put('/duo/update-user',[DuoController::class, 'updateUser']);
Route::delete('/duo/delete-user', [DuoController::class, 'deleteUser']);
Route::get('/duo/request', [DuoController::class, 'sendRequest']);
Route::post('/duo/create-user', [DuoController::class, 'createUser']);


Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // Recupera o usuário autenticado corretamente
    $user = User::where('email', $request->email)->firstOrFail();

    // Cria um token de acesso
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer'
    ]);

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:5,1'); // 5 tentativas por 1 minuto
});

