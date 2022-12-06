<?php

use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'isAdmin'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('backend.admin.dashboard');
    })->name('dashboard');
});



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::controller(EventController::class)->group(function () {
        Route::get('/create-event', 'index');
        Route::post('/event', 'store');
        Route::get('/view-event', 'view');
        Route::get('/event/{eventId}/edit', 'edit');
        Route::put('/event/{eventId}', 'update');
        Route::delete('/event/{eventId}/delete', 'destroy');

    });
});
