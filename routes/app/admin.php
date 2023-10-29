<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\AdminClientsController;
use App\Http\Controllers\Admin\AdminAgentsController;
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

Route::resource('/tickets', AdminTicketController::class);

Route::resource('/perfil', AdminProfileController::class);
Route::resource('/clients', AdminClientsController::class);
Route::resource('/agents', AdminAgentsController::class);
Route::get('/clients/{client}', 'Admin\AdminClientsController@edit')->name('admin.clients.edit');
Route::get('/agents/{agents}', 'Admin\AdminAgentsController@edit')->name('admin.agents.edit');
// Route::put('/clients/{client}', 'Admin\AdminClientsController@update')->name('admin.clients.update');
// Route::put('/clients/{client}', [AdminClientsController::class, 'update'])->name('admin.clients.update');
// Route::get('/clients/{client}', 'AdminClientsController@edit')->name('admin.clients.edit');
// Route::put('/clients/{client}', 'AdminClientsController@update')->name('admin.clients.update');
