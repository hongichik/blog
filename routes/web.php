<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\PostsController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\FeedbackController;

Route::get('/', [HomeController::class,'index']);
Route::get('/about', function ()
{
    return  view('user.About');
});

Route::get('/contact', [ContactController::class,'index']);
Route::post('/Feedback', [FeedbackController::class,'FeedbackPost']);

Route::get('/Search/{keySearch}/{page}', [PostsController::class,'Search'])->where('page', '[0-9]+');
Route::get('/bai-viet/{keyPost}', [PostsController::class,'NaviPost']);

Route::get('/{Category}/{page}', [PostsController::class,'Category'])->where('page', '[0-9]+');
Route::get('/{Category}/{CategoryChild}/{page}', [PostsController::class,'CategoryChild'])->where('page', '[0-9]+');
Route::get('/{Category}/{CategoryChild}/{posts}/{page}', [PostsController::class,'Posts'])->where('page', '[0-9]+');
Route::get('/{Category}/{CategoryChild}/{posts}/{post}/{page}', [PostsController::class,'Post'])->where('page', '[0-9]+');

