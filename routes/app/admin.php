<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\AdminClientsController;
use App\Http\Controllers\Admin\AdminAgentsController;
use App\Http\Controllers\Admin\InactiveClientsController;
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
Route::resource('/inactive-clients', InactiveClientsController::class);
Route::get('/mostrar', function () {
    return view('mails.tickets.admin-ticket-abierto');
});
// Route::get('/mostrar', function () {
//     return view('mails.tickets.agent-ticket-asignado');
// });
// Route::get('/mostrar', function () {
//     return view('mails.tickets.client-ticket-abierto');
// });
// Route::get('/mostrar', function () {
//     return view('mails.tickets.client-ticket-asignado');
// });
