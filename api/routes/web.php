<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvestmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rota para criar um novo investimento
Route::post('/investments', [InvestmentController::class, 'create']);

// Rota para realizar uma retirada de investimento
Route::put('/investments/{investmentId}/withdraw', [InvestmentController::class, 'withdraw']);

// Rota para listar os investimentos de um usuário paginados
Route::get('/investments/{userId}', [InvestmentController::class, 'listInvestments']);
