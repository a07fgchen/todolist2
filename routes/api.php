<?php

use App\Http\Controllers\TodoListApiController;
use App\Http\Controllers\TodoListController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->prefix('todolist')->group(function () {
    Route::get('/', [TodoListApiController::class, 'index'])->name('index');
    Route::post('/', [TodoListApiController::class, 'store'])->name('store');
    Route::delete('/{id}', [TodoListApiController::class, 'destroy'])->name('api.destroy');
    Route::patch('/{id}', [TodoListApiController::class, 'update'])->name('api.update');
    Route::patch('/content/{id}', [TodoListApiController::class, 'updateContent'])->name('api.updateContent');
});
