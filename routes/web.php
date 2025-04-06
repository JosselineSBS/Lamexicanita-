<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});

Route::get('/pollo', function () {
    return view('/admin/products/index');
});

Route::get('/products/{product}/delete',[App\Http\Controllers\ProductController::class, 'delete'])
-> name('products.delete');
// Route::get('/products',[App\Http\Controllers\ProductController::class , 'index'])
// -> name('products.index');

// Route::get('/products/create',[App\Http\Controllers\ProductController::class, 'create'])
// -> name('products.create');

// Route::post('/products',[App\Http\Controllers\ProductController::class, 'store'])
// -> name('products.store');

// Route::get('/products/{product}',[App\Http\Controllers\ProductController::class, 'show'])
// -> name('products.show');

// Route::get('/products/{product}/edit',[App\Http\Controllers\ProductController::class, 'edit'])
// -> name('products.edit');

// Route::patch('/products/{product}',[App\Http\Controllers\ProductController::class, 'update'])
// -> name('products.update');



// Route::delete('/products/{product}',[App\Http\Controllers\ProductController::class, 'destroy'])
// -> name('products.destroy');

Route::resource(('/brands'),App\Http\Controllers\BrandController::class);
Route::resource(('/clients'),App\Http\Controllers\ClientController::class);
Route::resource(('/sales'),App\Http\Controllers\SaleController::class);
Route::resource(('/addresses'),App\Http\Controllers\AddressController::class);

// Rutas de registro de Login
Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class, 'show'])->name('register');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class, 'handle'])->name('register.handle');

// Rutas de Login
Route::get('/login',[App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class, 'handle'])->name('login.handle');

// Rutas de Logout
Route::post('/logout',[App\Http\Controllers\Auth\LogoutController::class, 'handle'])->name('logout.handle');

// Middlewere de control de rutas para acceso de autentificación 
Route::middleware(['auth'])->group(function () {
    Route::resource(('/products'),App\Http\Controllers\ProductController::class);
});
