<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\CatalogController;
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


Route::get('/products', [ProductController::class, 'index']);
Route::redirect('/', '/products');
Route::get('/products/{id}', [ProductController::class, 'show']);

#Routes for Catalog

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

# Admin routes
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::redirect('admin', 'admin/dashboard');
Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::post('/admin/adminaddproducts', [AdminProductController::class, 'store']);
Route::post('/admin/products', [AdminProductController::class, 'store']);
Route::get('/admin/adminaddproducts', [AdminProductController::class, 'add_index']);
Route::get('/admin/customers', [AdminCustomerController::class, 'index']);
Route::get('/admin/orders', [AdminOrderController::class, 'index']);

Route::get('/home', [HomeController::class, '_construct']);
Route::get('/home', [HomeController::class, 'index']);

Auth::routes();
