<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('blogs')->group(function () {
    Route::get('', [\App\Http\Controllers\API\APIBlogController::class, 'index'])->name('api.blogs.index');
    Route::post('', [\App\Http\Controllers\API\APIBlogController::class, 'store'])->name('api.blogs.store');
    Route::get('{id}', [\App\Http\Controllers\API\APIBlogController::class, 'show'])->name('api.blogs.show');
    Route::put('{id}', [\App\Http\Controllers\API\APIBlogController::class, 'update'])->name('api.blogs.update');
    Route::delete('{id}', [\App\Http\Controllers\API\APIBlogController::class, 'destroy'])->name('api.blogs.destroy');
});

Route::prefix('tags')->group(function () {
    Route::get('', [\App\Http\Controllers\API\APITagController::class, 'index'])->name('api.tags.index');
    Route::post('', [\App\Http\Controllers\API\APITagController::class, 'store'])->name('api.tags.store');
    Route::get('{id}', [\App\Http\Controllers\API\APITagController::class, 'show'])->name('api.tags.show');
    Route::put('{id}', [\App\Http\Controllers\API\APITagController::class, 'update'])->name('api.tags.update');
    Route::delete('{id}', [\App\Http\Controllers\API\APITagController::class, 'destroy'])->name('api.tags.destroy');
});
Route::prefix('blogs')->group(function () {
    Route::get('{blogId}/tags', [\App\Http\Controllers\API\APITagController::class, 'blog_tags'])->name('api.blog_tags.show');
});
