<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/welcome', function () {
    return "Welcome to Laravel";
})->middleware('onlyindian');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/customer', CustomerController::class);
//   php artisan r:l
//   GET|HEAD        customer ............................................................ customer.index › CustomerController@index
//   POST            customer ............................................................ customer.store › CustomerController@store
//   GET|HEAD        customer/create ................................................... customer.create › CustomerController@create
//   GET|HEAD        customer/{customer} ................................................... customer.show › CustomerController@show
//   PUT|PATCH       customer/{customer} ............................................... customer.update › CustomerController@update
//   DELETE          customer/{customer} ............................................. customer.destroy › CustomerController@destroy
//   GET|HEAD        customer/{customer}/edit .............................................. customer.edit › CustomerController@edit

});

require __DIR__.'/auth.php';
