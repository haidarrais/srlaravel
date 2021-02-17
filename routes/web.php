<?php


use App\Http\Controllers\AdminController;

use App\Http\Controllers\Content\PromoController;
use App\Http\Controllers\Content\InvestmentController;
use App\Http\Controllers\Content\TravelController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\BotTelegramController;
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

Route::get('/', [ContentController::class, 'index'])->name('dashboard');
//cegah halaman admin diakses sebelum login
Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/admin', [AuthController::class, 'index'])->name('admindashboard');
});

Route::group(['middleware'=>['DoubleLogin']], function(){
    Route::get('/admin/login',[AdminController::class, 'index'])->name("login");
});
Route::post('/admin/login',[AdminController::class, 'signin']);
Route::get('/admin/logout',[AdminController::class, 'signout'])->name('logout');

Route::resource('admin/promo', PromoController::class);
Route::resource('admin/travel', TravelController::class);
Route::resource('admin/investment', InvestmentController::class);

Route::post('/kirim', [BotTelegramController::class, 'kirimPesan'])->name('kirim');
