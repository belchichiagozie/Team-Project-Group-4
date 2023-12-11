<?php

use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ReviewController;

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


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::redirect('/', '/products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

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


# Routes for Home

Route::get('/home', [HomeController::class, '_construct']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/basket/view', [BasketController::class, 'viewBasket'])->name('basket.view');
Route::post('/basket/add', [BasketController::class, 'addToBasket'])->name('basket.add');
Route::post('/basket/remove', [BasketController::class, 'removeFromBasket'])->name('basket.remove');
Route::get('/basket/total', [BasketController::class, 'calculateTotal'])->name('basket.total');


# Routes for Reviews

Route::get("/add-review/{id}", [ReviewController::class, "add"])->name('reviews.add');
Route::post("/add-review/{id}", [ReviewController::class, "create"])->name('reviews.create');


Auth::routes();
