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
Route::get('/addcombotocart/{id}', [HomeController::class, 'addcombotocart']);

Route::post('/makeorder', [HomeController::class, 'makeorder']);

Route::get('/food', [AdminController::class, 'food']);
Route::post('/addfood', [AdminController::class, 'addfood']);
Route::get('/deletefood/{id}', [AdminController::class, 'deletefood']);
Route::get('/updatefood/{id}', [AdminController::class, 'updatefood']);
Route::post('/confirmupdatefood/{id}', [AdminController::class, 'confirmupdatefood']);

Route::get('/combo', [AdminController::class, 'combo']);
Route::post('/addcombo', [AdminController::class, 'addcombo']);
Route::get('/deletecombo/{id}', [AdminController::class, 'deletecombo']);

Route::get('/order', [AdminController::class, 'order']);

Route::get('/menu', [AdminController::class, 'menu']);

Route::get('/user', [AdminController::class, 'user']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

Route::get('/rejectorder/{id}', [AdminController::class, 'rejectorder']);
Route::get('/confirmorder/{id}', [AdminController::class, 'confirmorder']);
Route::get('/shippingorder/{id}', [AdminController::class, 'shippingorder']);
Route::get('/finisheoder/{id}', [AdminController::class, 'finisheoder']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




