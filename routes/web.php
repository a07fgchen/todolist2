<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TodoListController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
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
// Route::post('/', [TodoListController::class, 'store'])->name('store');
// Route::delete('/{todolist:id}', [TodoListController::class, 'destroy'])->name('destroy');

Route::get('/test', function () {
    return view('mail.todolist');
});

Route::middleware(['auth', 'verified'])->prefix('todolist')->group(function () {
    Route::get('/', [TodoListController::class, 'index'])->name('index');
    Route::post('/', [TodoListController::class, 'store'])->name('store');
    Route::delete('/{todolist:id}', [TodoListController::class, 'destroy'])->name('destroy');
});

Route::get('/send', function () {
    Mail::to('abc@abc.com')->send(new TestMail());
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
