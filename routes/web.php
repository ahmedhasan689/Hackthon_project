<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProfileController;

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

// Home Page Route
Route::get('/', [HomeController::class, 'home'])->name('home');
// Route::get('/home', [HomeController::class, 'redirect'])->middleware(['auth:web,customer,delivery'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Cart Controller
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');


Route::namespace('/Front')
    ->middleware(['auth:web,customer,delivery'])
    ->group(function () {

        // Start Profile Route [ ProfileController ]
        Route::group([
            'prefix' => 'profile',
            'as' => 'profile.'
        ], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::get('/create', [ProfileController::class, 'create'])->name('create');
            Route::post('/', [ProfileController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ProfileController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProfileController::class, 'update'])->name('update');
            Route::delete('/{id}', [ProfileController::class, 'destroy'])->name('delete');
        });
        // End Profile Route [ ProfileController ]

        // Start Product Route [ Product Controller ]
        Route::group([
            'prefix' => 'product',
            'as' => 'product.'
        ], function () {
            Route::get('/', [ProductsController::class, 'index'])->name('index');
            Route::get('/create', [ProductsController::class, 'create'])->name('create');
            Route::post('/', [ProductsController::class, 'store'])->name('store');
            Route::get('/{id}', [ProductsController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [ProductsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProductsController::class, 'update'])->name('update');
            Route::delete('/{id}', [ProductsController::class, 'destroy'])->name('delete');
        });
    });
