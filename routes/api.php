<?php

use App\Http\Controllers\Api\BlogController;
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

Route::prefix('blogs')->group(function() {
    Route::get('', [BlogController::class, 'list'])->name('blog.list');
    Route::post('', [BlogController::class, 'create'])->name('blog.create');
    Route::get('detail/{id}', [BlogController::class, 'detail'])->name('blog.detail');
    Route::put('{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('{id}', [BlogController::class, 'delete'])->name('blog.delete');
});