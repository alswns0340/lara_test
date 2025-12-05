<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GithubAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/auth/github/redirect', [GithubAuthController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/github/callback', [GithubAuthController::class, 'callback']);

Route::get('/admin',function(){
    return '관리자 대시보드';
})->middleware('can:view-admin-dashboard');

Route::resource('posts', PostController::class);

Route::middleware('auth')->group(function () {
    Route::post('/posts/{post}/comments', [PostCommentController::class, 'store'])
        ->name('posts.comments.store');

    Route::put('/comments/{comment}', [PostCommentController::class, 'update'])
        ->name('comments.update');

    Route::delete('/comments/{comment}', [PostCommentController::class, 'destroy'])
        ->name('comments.destroy');
});
require __DIR__.'/auth.php';
