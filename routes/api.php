<?php

use App\Http\Controllers\GeodataController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/login', [UserController::class, 'authenticate'])->name('user.login');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/get_user', [UserController::class, 'get_user'])->name('user.get_user');
    Route::get('/geodata', [GeodataController::class, 'index'])->name('geodata.index');
    Route::get('/geodata/{id}', [GeodataController::class, 'show'])->name('geodata.show');
});
