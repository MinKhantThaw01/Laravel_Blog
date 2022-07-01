<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blog/{blog:slug}', [BlogController::class,'show']);

Route::post('/blog/{blog:slug}/comment', [CommentController::class,'store']);

Route::post('/blog/{blog:slug}/subscription', [BlogController::class,'subscriptionHandler']);


Route::get('/register', [AuthController::class,'create'])->middleware('guest');
Route::post('/register', [AuthController::class,'store'])->middleware('guest');
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::get('/login', [AuthController::class,'login'])->middleware('guest');
Route::post('/login', [AuthController::class,'post_login'])->middleware('guest');

Route::middleware('can:admin')->group(function () {
    Route::get('/admin/blogs/create', [AdminBlogController::class,'create']);
    Route::post('/admin/blogs/store', [AdminBlogController::class,'store']);


    Route::get('/admin/blogs', [AdminBlogController::class,'index']);

    Route::delete('/admin/{blog:slug}/delete', [AdminBlogController::class,'destroy']);
    Route::get('/admin/{blog:slug}/edit', [AdminBlogController::class,'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class,'update']);
});

// all -> index ->blogs.index
// single -> show ->blogs.show
// form ->create ->blogs.create
// server store ->store -> -
// edit form -> edit ->blogs.edit
// server update -> update -> -
// server delete -> destroy -> -


// all -> index ->students.index
// single -> show ->students.show
// form ->create ->students.create
// server store ->store -> -
// edit form -> edit ->students.edit
// server update -> update -> -
// server delete -> destroy -> -
