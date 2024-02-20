<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\BasketController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCustomerController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Routes for main Products page
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::redirect('/', '/products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

//Routes for Catalog page
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

//Routes for Basket page
Route::get('/basket/view', [BasketController::class, 'viewBasket'])->name('basket.view');
Route::post('/basket/add', [BasketController::class, 'addToBasket'])->name('basket.add');
Route::post('/basket/remove', [BasketController::class, 'removeFromBasket'])->name('basket.remove');
Route::get('/basket/total', [BasketController::class, 'calculateTotal'])->name('basket.total');

//Routes for Admin Panel page
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::redirect('admin', 'admin/dashboard');
Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::post('/admin/adminaddproducts', [AdminProductController::class, 'store']);
Route::post('/admin/products', [AdminProductController::class, 'store']);
Route::get('/admin/adminaddproducts', [AdminProductController::class, 'add_index']);
Route::get('/admin/customers', [AdminCustomerController::class, 'index']);
Route::get('/admin/orders', [AdminOrderController::class, 'index']);

require __DIR__.'/auth.php';
