<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CMS Routes
|--------------------------------------------------------------------------
|
| Here is where you can register cms routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return view('cms.index');
})->name('cms.index');

Route::prefix('blogs')->group(function () {
    Route::get('', [App\Http\Controllers\CMS\CMSBlogController::class, 'index'])->name('cms.blogs.index');
    Route::get('create', [App\Http\Controllers\CMS\CMSBlogController::class, 'create'])->name('cms.blogs.create');
    Route::get('{id}', [App\Http\Controllers\CMS\CMSBlogController::class, 'show'])->name('cms.blogs.show');
    Route::post('', [App\Http\Controllers\CMS\CMSBlogController::class, 'store'])->name('cms.blogs.store');
    Route::get('{id}/edit', [App\Http\Controllers\CMS\CMSBlogController::class, 'edit'])->name('cms.blogs.edit');
    Route::put('{id}', [App\Http\Controllers\CMS\CMSBlogController::class, 'update'])->name('cms.blogs.update');
    Route::delete('{id}', [App\Http\Controllers\CMS\CMSBlogController::class, 'delete'])->name('cms.blogs.destroy');
});

Route::prefix('tags')->group(function () {
    Route::get('', [App\Http\Controllers\CMS\CMSTagController::class, 'index'])->name('cms.tags.index');
    Route::get('create', [App\Http\Controllers\CMS\CMSTagController::class, 'create'])->name('cms.tags.create');
    Route::get('{id}', [App\Http\Controllers\CMS\CMSTagController::class, 'show'])->name('cms.tags.show');
    Route::post('', [App\Http\Controllers\CMS\CMSTagController::class, 'store'])->name('cms.tags.store');
    Route::get('{id}/edit', [App\Http\Controllers\CMS\CMSTagController::class, 'edit'])->name('cms.tags.edit');
    Route::put('{id}', [App\Http\Controllers\CMS\CMSTagController::class, 'update'])->name('cms.tags.update');
    Route::delete('{id}', [App\Http\Controllers\CMS\CMSTagController::class, 'delete'])->name('cms.tags.destroy');
});
