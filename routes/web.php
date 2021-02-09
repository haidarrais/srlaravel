<?php

use App\Http\Controllers\Content\PromoController;
use App\Http\Controllers\Content\TravelController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\User\ContentController;
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

Route::prefix(('user'))
    ->namespace('User')
    ->group(function(){
        Route::get('/', [ContentController::class, 'index'])
            ->name('dashboard');
});

Route::prefix(('admin'))
    ->namespace('Admin')
    ->group(function(){
        Route::get('/dashboard', [AuthController::class, 'index'])
            ->name('dashboard');
});

Route::resource('admin/promo', PromoController::class);
Route::resource('admin/travel', TravelController::class);
