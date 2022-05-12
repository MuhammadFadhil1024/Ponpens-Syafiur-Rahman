<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventGalleryController;
use App\Http\Controllers\DivisionGalleryController;
use App\Http\Controllers\FacilityGalleryController;
use App\Http\Controllers\FrontendController;

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

Route::get('/', [FrontendController::class, 'index'])->name('index');


Route::middleware(['auth:sanctum', 'verified'])->name('dashboard.')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware(['admin'])->group(function () {
        Route::resource('event', EventController::class);
        Route::resource('event.eventgallery', EventGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);
        Route::resource('division', DivisionController::class);
        Route::resource('division.divisiongallery', DivisionGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);
        Route::resource('user', UserController::class);
        Route::resource('facility', FacilityController::class);
        Route::resource('facility.facilitygallery', FacilityGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);
    });

    Route::middleware(['santri'])->group(function () {
        Route::resource('article', ArticleController::class);
    });
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
