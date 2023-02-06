<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function(){
    Route::get('/', function(){
        return view('dashboard');
    })->name('dashboard');
    Route::post('/upload-csv-records', [UserController::class, 'uploadData'])->name('user.csv_upload');
});

require __DIR__.'/auth.php';



Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/pets', [AdminController::class, 'pets'])->name('admin.pets');
    Route::post('/pet-from-api', [AdminController::class, 'storePets'])->name('admin.store_pets');
    // Route::post('/upload-csv-records', [UserController::class, 'uploadData'])->name('user.csv_upload');
});


require __DIR__.'/adminauth.php';



