<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\AdminLoginAPIController;
use App\Http\Controllers\LoginAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('web')->group(function () {
    Route::post('/admin/login', [AdminLoginAPIController::class, 'login']);
    Route::post('/admin/logout', [AdminLoginAPIController::class, 'logout']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/addbook',[APIController::class,'store']);
Route::put('/updatebook/{id}', [APIController::class, 'update']);
Route::get('/admin/products',[APIController::class, 'getBooks']);
Route::get('/admin/favouritebooks',[APIController::class, 'getFavourites']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});










