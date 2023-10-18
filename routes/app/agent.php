<?php

use App\Http\Controllers\Agent\AgentClientesAjaxController;
use App\Http\Controllers\Agent\AgentClientesController;
use App\Http\Controllers\Agent\AgentCommentController;
use App\Http\Controllers\Agent\AgentProfileController;
use App\Http\Controllers\Agent\AgentTicketController;
use Illuminate\Support\Facades\Route;

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

Route::resource('tickets', AgentTicketController::class);

Route::resource('/perfil', AgentProfileController::class);

Route::resource('/clientes', AgentClientesController::class);
Route::resource('clientes/ajax', AgentClientesAjaxController::class);

Route::post('/comments/{ticket}', [AgentCommentController::class,'store'])->name('comments.store');
