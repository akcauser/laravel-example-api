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
    Route::get('', [\App\Http\Controllers\Api\ApiBlogController::class, 'index'])->name('blog.index');
    Route::post('', [\App\Http\Controllers\Api\ApiBlogController::class, 'store'])->name('blog.store');
    Route::get('{id}', [\App\Http\Controllers\Api\ApiBlogController::class, 'show'])->name('blog.show');
    Route::put('{id}', [\App\Http\Controllers\Api\ApiBlogController::class, 'update'])->name('blog.update');
    Route::delete('{id}', [\App\Http\Controllers\Api\ApiBlogController::class, 'destroy'])->name('blog.destroy');
});
