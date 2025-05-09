<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\TipoMovimentacaoController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();  // Retorna os dados do usuário autenticado
});

Route::get('/produtos', [ApiController::class, 'getProdutos']);
Route::get('/fornecedores', [ApiController::class, 'getFornecedores']);
Route::get('/relatorio', [ApiController::class, 'getRelatorio']);
Route::get('/funcionarios', [ApiController::class, 'getFuncionarios']);
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'message' => 'Credenciais inválidas'
        ], 401);
    }

    $user = User::where('email', $request->email)->firstOrFail();

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
});
