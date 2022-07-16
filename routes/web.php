<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\page\HomeController::class,'index']);
Route::get('/book-review/{id}', [\App\Http\Controllers\page\HomeController::class,'viewBook'])->name('bookReview');
Route::post('/book-review', [\App\Http\Controllers\page\HomeController::class,'comment'])->name('comment');
Route::post('/book-review-point', [\App\Http\Controllers\page\HomeController::class,'point'])->name('point');
Auth::routes();
Route::group(['middleware' => ['admin']], function () {
    Route::resource('/comment',CommentController::class);
    Route::resource('/book',BookController::class);
    Route::resource('/point',PointController::class);
    Route::resource('/user',UserController::class);
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
