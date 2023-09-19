<?php

use App\Http\Controllers\Client\ClientProfileController;
use App\Http\Controllers\Client\ClientTicketController;
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

Route::resource('/tickets', ClientTicketController::class);

Route::resource('/perfil', ClientProfileController::class);
Route::get('/app/client/perfil/{perfil}/edit', [ClientProfileController::class, 'edit'])->name('client.perfil.edit');
Route::put('/app/client/perfil/{perfil}', [ClientProfileController::class, 'update'])->name('client.profile.update');
