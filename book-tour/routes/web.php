<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('/products');
});

Route::get('/products', function () {
    return view('/products');
});
<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('/products');
});

Route::get('/products', function () {
    return view('/products');
});

Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::redirect('admin', 'admin/dashboard');

Route::get('/admin/products', [AdminProductController::class, 'index']);

Route::get('/admin/customers', [AdminCustomerController::class, 'index']);

Route::get('/admin/orders', [AdminOrderController::class, 'index']);
