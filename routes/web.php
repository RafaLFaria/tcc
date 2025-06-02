<?php

use App\Http\Controllers\BaixaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MovimentacaoController;

Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
    return view('profile.show');

})->name('profile.show');



Route::resource('fornecedores', FornecedorController::class)->middleware('auth');

Route::resource('produtos', ProdutoController::class)->middleware('auth');

Route::resource('estoque', EstoqueController::class)->middleware('auth');

Route::resource('movimentacao', MovimentacaoController::class)->middleware('auth');

Route::resource('compra', CompraController::class)->middleware('auth');

Route::resource('baixa', BaixaController::class)->middleware('auth');

Route::resource('unidade', UnidadeController::class)->middleware('auth');

Route::resource('funcionarios', FuncionarioController::class)->middleware('admin');

Route::get('perfil', function () {
    return view('perfil');
})->middleware('auth');


Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth');

