<?php

use App\Http\Controllers\BlogController;
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

Route::prefix('blogs')->group(function() {
    Route::get('', [BlogController::class, 'list'])->name('blog.index');
    Route::get('create', [BlogController::class, 'create_form'])->name('blog.create_form');
    Route::get('update/{id}', [BlogController::class, 'update_form'])->name('blog.update_form');
    Route::post('', [BlogController::class, 'create'])->name('blog.create');
    Route::put('{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('{id}', [BlogController::class, 'delete'])->name('blog.delete');
});
