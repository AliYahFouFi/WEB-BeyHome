<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FavoritesController;


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
    return view('welcome');
});


Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::get('/property', function () {
//     return view('show-property');
// });

Route::get('/property/{id}', [PropertyController::class, 'show'])->name('property.show');

Route::post('/properties/{property}/reviews', [ReviewController::class, 'storeRating'])->name('reviews.store');

//for favorites

Route::group(['middleware' => 'auth'], function () {
    Route::post('/properties/{property}/favorites', [FavoritesController::class, 'store'])->name('favorites.store');
    Route::get('/favorites', [FavoritesController::class, 'show'])->name('favorites.show');
    Route::delete('/favorites/{property}', [FavoritesController::class, 'destroy'])->name('favorites.destroy');
});

//for ratings
Route::post('/properties/{property}/reviews', [ReviewController::class, 'storeRating'])->name('reviews.store');
Route::post('/properties/{property}/reviews/store', [ReviewController::class, 'storeReview'])->middleware('auth')->name('WrittenReviews.store');

//filter

Route::get('/filter', [PropertyController::class, 'filter'])->name('filter');

//BREEZE

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store')->middleware('auth');

require __DIR__ . '/auth.php';


// Route::get('/index', function () {
//     return view('index');
// });

// Route::get('/places', function () {
//     return view('shop');
// });



//for testing
Route::get('/test', [PropertyController::class, 'showfilter'])->name('filter-show');
