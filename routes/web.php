<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Models\Category;
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


// ADMIM

Route::prefix('admin')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('', [CategoriesController::class, 'all'])->name('admin.categories.all');

        Route::get('create', [CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('', [CategoriesController::class, 'store'])->name('admin.categories.store');


    });

});