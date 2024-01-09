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

Route::get('/user/{userId}/balance', [UserController::class, 'getBalance']);

Route::post('/investment/create', [InvestmentController::class, 'create']);
Route::post('/investment/withdraw/{investmentId}', [InvestmentController::class, 'withdraw']);
Route::get('/user/{userId}/investments', [InvestmentController::class, 'listInvestments']);
