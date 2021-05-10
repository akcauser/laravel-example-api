<?php

use App\Http\Controllers\CMS\CMSBlogController;
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

Route::get('/cms', function () {
    return view('home');
});

Route::prefix('blogs')->group(function () {
    Route::get('', [CMSBlogController::class, 'index'])->name('cms.blogs.index');
    Route::get('{id}', [CMSBlogController::class, 'show'])->name('cms.blogs.show');
    Route::get('create', [CMSBlogController::class, 'create'])->name('cms.blogs.create');
    Route::post('', [CMSBlogController::class, 'store'])->name('cms.blogs.store');
    Route::get('{id}/edit', [CMSBlogController::class, 'edit'])->name('cms.blogs.edit');
    Route::put('{id}', [CMSBlogController::class, 'update'])->name('cms.blogs.update');
    Route::delete('{id}', [CMSBlogController::class, 'delete'])->name('cms.blogs.delete');
});
