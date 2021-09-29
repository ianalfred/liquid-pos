<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/staff', \App\Http\Livewire\Staff\Show::class)->name('staff');
    Route::get('/staff/create', \App\Http\Livewire\Staff\Create::class)->name('create-user');

    Route::get('/categories', \App\Http\Livewire\Category\Show::class)->name('categories');

    Route::get('/products', \App\Http\Livewire\Item\Show::class)->name('products');

    Route::get('/inventories', \App\Http\Livewire\Inventory\Show::class)->name('inventories');
    Route::get('/inventories/create', \App\Http\Livewire\Inventory\Create::class)->name('create-inventory');

    Route::get('/cash-register', \App\Http\Livewire\Sales\Register::class)->name('sales.register');
    Route::get('/sales-reports', \App\Http\Livewire\Sales\Sales::class)->name('sales.sales');
});
