<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[HomeController::class, 'homepage'] )->name('');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/home/create',[PostController::class, 'create'])->name('post.create');

Route::post('/home/create',[PostController::class, 'store'])->name('post.store');

Route::get('/home/edit/{post}',[PostController::class, 'edit'])->name('post.edit');

Route::put('/home/edit/{post}',[PostController::class, 'update'])->name('post.update');

Route::get('/home/posts/{post}',[PostController::class, 'delete'])->name('post.delete');

Route::get('/home/search',[HomeController::class, 'search'])->middleware('auth')->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
