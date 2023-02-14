<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductCatrgoryController;
use App\Http\Controllers\Backend\ProductUnitController;
use App\Http\Controllers\Backend\SupplierController;
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
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware(['auth', 'verified'])->name('admin.dashboard');
    
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::name('adduser.')->group(function () {
        Route::prefix("adduser")->group(function(){
            Route::controller(RegisteredUserController::class)->group(function () {
        
                Route::get('/index', 'index')->name('register');
                Route::post('register', 'store')->name('store');
                Route::get('/{user}', 'edit')->name('edit');
                Route::put('/{user}', 'update')->name('update');
                Route::delete('/destroy/{user}', 'destroy')->name('destroy');
            });
        });
    });
    
    Route::resource('product', ProductController::class);
    Route::resource('product-category', ProductCatrgoryController::class);
    Route::resource('product-unit', ProductUnitController::class);
    Route::resource('supplier', SupplierController::class);

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/api.php';
