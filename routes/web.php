<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/cart/{id}', [HomeController::class, 'cart']);
Route::get('/addtocart/{id}', [HomeController::class, 'addtocart']);

Route::post('/makeorder', [HomeController::class, 'makeorder']);

Route::get('/food', [AdminController::class, 'food']);
Route::post('/addfood', [AdminController::class, 'addfood']);
Route::get('/deletefood/{id}', [AdminController::class, 'deletefood']);

Route::get('/combo', [AdminController::class, 'combo']);
Route::post('/addcombo', [AdminController::class, 'addcombo']);
Route::get('/deletecombo/{id}', [AdminController::class, 'deletecombo']);

Route::get('/order', [AdminController::class, 'order']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




