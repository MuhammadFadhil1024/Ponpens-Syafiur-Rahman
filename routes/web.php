<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
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
use App\Http\Controllers\ManagementController;

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
Route::get('/profil', [FrontendController::class, 'profil'])->name('profil');
Route::get('/event', [FrontendController::class, 'event'])->name('event');
Route::get('/divisi', [FrontendController::class, 'divisi'])->name('divisi');
Route::get('/artikel', [FrontendController::class, 'artikel'])->name('artikel');
Route::get('/detailartikel', [FrontendController::class, 'detailartikel'])->name('detailartikel');
Route::get('/detailevent', [FrontendController::class, 'detailevent'])->name('detailevent');
Route::get('/detaildivisi', [FrontendController::class, 'detaildivisi'])->name('detaildivisi');
Route::get('/detailarticle', [FrontendController::class, 'detailarticle'])->name('detailarticle');


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
        Route::resource('banner', BannerController::class);
        Route::resource('management', ManagementController::class);
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
