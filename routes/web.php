<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

// Users Section
Route::get('/{user:username}/profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('/{user:username}/edit', [UserController::class, 'edit']);
Route::patch('/{user:username}/update', [UserController::class, 'update']);

// Comment Section
Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store'])->middleware('auth');
Route::post('/blogs/{comment}/delete', [CommentController::class, 'destroy'])->middleware('auth');

//Subscription
Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler'])->middleware('auth');

//Admin Route
Route::middleware('can:admin')->group(function () {
    Route::get('/admin/blogs/index', [AdminBlogController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create']);
    Route::post('/admin/blogs/store', [AdminBlogController::class, 'store']);
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update']);
    Route::delete('/admin/blogs/{blog:slug}/delete', [AdminBlogController::class, 'destroy']);

    // User Manage

    Route::get('/admin/users/usersManage', [AdminUserController::class, 'index']);
    Route::delete('/admin/users/{user:username}/delete', [AdminUserController::class, 'destroy']);
});


// Auth

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';







// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');