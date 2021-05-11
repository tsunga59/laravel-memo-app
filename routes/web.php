<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MemoController;
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

Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.exec');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.exec');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/memo', [MemoController::class, 'index'])->name('memo.index');
    Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create');
    Route::get('/memo/select', [MemoController::class, 'select'])->name('memo.select');
    Route::post('/memo/update', [MemoController::class, 'update'])->name('memo.update');
});