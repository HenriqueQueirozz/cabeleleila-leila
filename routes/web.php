<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AgendamentoController;

use App\Http\Controllers\UserController;
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

Route::get('/', function () { return view('index'); })->name('index');
Route::get('/user', function () { return view('user'); })->name('user');
Route::get('/servico', function () { return view('servico'); })->name('servico');
Route::get('/agendamento', [AgendamentoController::class, 'index'])->name('agendamento');

Route::post('/v1/user/create', [UserController::class, 'store'])->name('user_store');
Route::post('/v1/servico/create', [ServicoController::class, 'store'])->name('servico_store');
Route::post('/v1/agendamento/create', [AgendamentoController::class, 'store'])->name('agendamento_store');
