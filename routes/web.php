<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.index');

Route::get('/memo', function() {
    return view('memo');
})->name('memo.index');
