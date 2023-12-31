<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\CommentSection;

Route::get('/',[HomeController::class, 'homepage'] )->name('');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/feed',FeedController::class)->middleware('auth')->name('feed');

Route::get('/home/create',[PostController::class, 'create'])->name('post.create');

Route::post('/home/create',[PostController::class, 'store'])->name('post.store');

Route::get('/home/edit/{post}',[PostController::class, 'edit'])->name('post.edit');

Route::put('/home/edit/{post}',[PostController::class, 'update'])->name('post.update');

Route::get('/home/posts/{post}',[PostController::class, 'delete'])->name('post.delete');

Route::post('/home/posts/{post}/comment',[CommentController::class, 'store'])->name('comment.store');

Route::delete('/home/posts/{comment}/comment',[CommentController::class, 'destroy'])->name('comment.detsroy');

Route::get('posts/{post}/like',[LikeController::class,'like'])->middleware('auth')->name('post.like');

Route::get('/users/{user}/follow',[ProfileController::class,'follow'])->middleware('auth')->name('user.follow');

// Route::get('/home/search',[HomeController::class, 'search'])->middleware('auth')->name('search');

//lang
Route::get('lang/{lang}', function($lang){
    App::setlocale($lang);
    session()->put('locale', $lang);
    
    redirect()->back();
})->name('lang')->middleware('web');

//notif
Route::get('/notif',[NotificationController::class,'index'])->middleware('auth')->name('notif.index');

//admin
Route::get('/admin',[AdminDashboardController::class,'index'])-> name('admin.index')->middleware('auth','can:admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/{user}',[ProfileController::class, 'show'])->name('profile.show');
});




Route::get('/comment-section', [CommentSection::class, 'render'])->name('comment-section');
require __DIR__.'/auth.php';