<?php

use Illuminate\Support\Facades\Artisan;
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
// <=================================== clear Route ===================>
Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('optimize:clear');
    dd("config cache clear");
});

Route::get('optimize', function () {
    Artisan::call('optimize');
    dd("config cache clear");
});

Auth::routes();


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('book')->middleware([])->group(function () {
    Route::controller(\App\Http\Controllers\MollieController::class)->group(function () {
        Route::get('/', 'index');
    });
});
