<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'home'])->name('home.view');
Route::get('/login', [AuthController::class, 'loginView'])->name('login.view');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login.action');
Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
Route::post('/register', [AuthController::class, 'registerAction'])->name('register.action');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.action');
Route::get('/product', [ProductController::class, 'product'])->name('product.view');
Route::get('/product/detail/{slug}', [ProductController::class, 'productDetail'])->name('product.detail');
Route::post('/buy', [AccountController::class, 'buy'])->name('account.buy');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('view');
        Route::post('/product/add', [AccountController::class, 'productStore'])->name('product.store');
        Route::post('/topup', [AccountController::class, 'topup'])->name('topup.store');
        Route::post('/withdraw', [AccountController::class, 'withdraw'])->name('withdraw.store');
    });
});

