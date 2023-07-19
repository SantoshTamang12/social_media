<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\UpdateUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/login', [Authcontroller::class, 'index'])->name('login');
Route::post('/login', [Authcontroller::class, 'login'])->name('login');
Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');
Route::get('/register', [Authcontroller::class, 'register_view'])->name('register');
Route::post('/register', [Authcontroller::class, 'register'])->name('register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/viewmypost', [CreatePostController::class, 'showpost']);
    Route::post('/createpost', [CreatePostController::class, 'createpost'])->name('createpost');
    Route::get('/updatepost/{id}', [CreatePostController::class, 'updatepost'])->name('updatepost');
    Route::put('/editpost/{id}', [CreatePostController::class, 'editpost'])->name('editpost');
    Route::get('/deletepost/{id}', [CreatePostController::class, 'deletepost'])->name('deletepost');
    Route::get('/viewprofile/{id}', [UpdateUserController::class, 'profile'])->name('profile');
    Route::get('/updateprofile/{id}', [UpdateUserController::class, 'update'])->name('update');
    Route::put('/updaprofile/{id}', [UpdateUserController::class, 'editprofile'])->name('editprofile');
    Route::post('/comment/{id}', [CommentController::class, 'comment'])->name('comment.store');
    // Route::get('/viewallcomment/{id}',[CommentController::class,'getallcomment'])->name('getallcomment');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/liked', [LikeController::class, 'liked'])->name('like.store');
    // Route::get('/viewpost', function () {
    //     return view('viewallpost');
    // });
    Route::get('/viewpost', [HomeController::class, 'index']);

    Route::get('/createpost', function () {
        return view('createpost');
    });
});
