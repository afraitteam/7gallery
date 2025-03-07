<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
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


route::get('test', function () {
    dd(bcrypt('test'));
});


// ADMIM

Route::prefix('admin')->group(function () {

    Route::prefix('categories')->group(function () {

        // Show All
        Route::get('', [CategoriesController::class, 'all'])->name('admin.categories.all');

        // Create
        Route::get('create', [CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('', [CategoriesController::class, 'store'])->name('admin.categories.store');

        // Delete
        Route::delete('{category_id}/delete', [CategoriesController::class, 'delete'])->name('admin.categories.delete');

        // Update
        Route::get('{category_id}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::put('{category_id}/update', [CategoriesController::class, 'update'])->name('admin.categories.update');
    });


    Route::prefix('products')->group(function () {

        // Show All
        Route::get('', [ProductsController::class, 'all'])->name('admin.products.all');

        // Create
        Route::get('create', [ProductsController::class, 'create'])->name('admin.products.create');
        Route::post('', [ProductsController::class, 'store'])->name('admin.products.store');

        // Delete Product
        Route::delete('{product_id}/delete', [ProductsController::class, 'delete'])->name('admin.products.delete');

        // Edit 
        Route::get('{product_id}/edit', [ProductsController::class, 'edit'])->name(name: 'admin.products.edit');
        Route::put('{product_id}/update', [ProductsController::class, 'update'])->name('admin.products.update');

        // Download File
        Route::get('{product_id}/download/demo', [ProductsController::class, 'downloadDemo'])->name('admin.products.download.demo');
        Route::get('{product_id}/download/soruce', [ProductsController::class, 'downloadSource'])->name('admin.products.download.source');



    });

});