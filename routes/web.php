<?php

use App\Http\Controllers\AdminController;
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

Route::get('/user', function () {
    return view('pages.user.dashboard');
});

Route::get('/admin', function () {
    return view('pages.admin.dashboard');
});


Route::get('/admin/login',[AdminController::class, 'index'])->name("login");
Route::post('/admin/login',[AdminController::class, 'signin']);
Route::get('/admin/logout',[AdminController::class, 'signout'])->name('logout');
