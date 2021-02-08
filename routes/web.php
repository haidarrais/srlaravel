<?php


use App\Http\Controllers\AdminController;

use App\Http\Controllers\PromoController;
use App\Http\Controllers\Admin\AuthController;
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

Route::prefix(('admin'))
    ->namespace('Admin')
    ->group(function(){
        Route::get('/', [AuthController::class, 'index'])
            ->name('dashboard');
});

Route::get('/admin/login',[AdminController::class, 'index'])->name("login");
Route::post('/admin/login',[AdminController::class, 'signin']);
Route::get('/admin/logout',[AdminController::class, 'signout'])->name('logout');

Route::resource('admin/promo', PromoController::class);

