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
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReadingListController;


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



// Routes for Reviews
Route::get("/add-review/{id}", [ReviewController::class, "add"])->name('reviews.add');
Route::post("/add-review/{id}", [ReviewController::class, "create"])->name('reviews.create');


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
Route::get('/checkout', [BasketController::class,'checkout'])->name('basket.checkout');

//Routes for ReadingList page
Route::get('/readinglist',[ReadingListController::class, 'index'])->middleware('auth');;
Route::post('/reading-list/add', [ReadingListController::class, 'addToReadingList'])->name('addrl');
Route::post('/reading-list/remove', [ReadingListController::class, 'removeFromReadingList'])->name('removerl');
Route::get('/reading-list', [ReadingListController::class, 'getReadingList']);

//Routes for Admin Panel page
Route::prefix('admin/')->group(function() {
    Route::get('dashboard', [AdminController::class, 'index']);
    Route::get('products',[AdminProductController::class, 'index']);
    Route::post('addproducts', [AdminProductController::class, 'store']);
    Route::post('products', [AdminProductController::class, 'store']);
    Route::get('addproducts', [AdminProductController::class, 'add_index']);
    Route::get('customers', [AdminCustomerController::class, 'index']);
    Route::get('orders', [AdminOrderController::class, 'index']);
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::get('/mainlogin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/mainlogin', [LoginController::class, 'login']);
Route::get('/mainregister',[RegisterController::class, 'showRegistrationForm']);
Route::post('/mainregister', [RegisterController::class, 'register']);




Route::redirect('/admin','/admin/login');


require __DIR__.'/auth.php';
