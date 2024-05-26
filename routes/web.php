<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Models\Tag;
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


Route::group(['prefix' => 'admin', 'namespece' => 'Admin'], function(){
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::get('/categories/index', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::get('/categories/{category}/edit',[CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::resource('/categories', CategoryController::class);


    Route::get('/tags/index', [TagController::class, 'index'])->name('admin.tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('admin.tags.create');
    Route::resource('/tags', TagController::class);

    Route::get('/posts/index', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::resource('/posts', PostController::class);
});

