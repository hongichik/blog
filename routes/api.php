<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Categories;
use App\Http\Controllers\API\ImgController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\AllInfoWebController;
use App\Http\Controllers\API\PostsController;
use App\Http\Controllers\API\PermissionController;

//admin
Route::middleware('auth')->group(function (){

    Route::get('/Category', [Categories::class,'show']); //show one
    Route::get('/CategoryAll', [Categories::class,'showAll']); //show all
    Route::get('/CategoryShowChild', [Categories::class,'ShowChild']); //show all
    Route::post('/newCategory', [Categories::class,'store']); //add
    Route::post('/DeleteCategory', [Categories::class,'destroy']); //delete
    Route::post('/UpdateCategory', [Categories::class,'update']); //update
    Route::post('/SearchCategory', [Categories::class,'search']); //search

    Route::post('/ContactEdit', [ContactController::class,'Edit']); //edit contact

    

    
    Route::post('/UploadImg', [ImgController::class,'uploadImg']); //upload img

    Route::post('/AddBlog', [PostsController::class,'AddBlog']); //add Blog 
    Route::post('/AddPost', [PostsController::class,'AddPost']); //add Post 
    Route::post('/AddChildPost', [PostsController::class,'AddChildPost']); 
    Route::get('/ListPosts', [PostsController::class,'ListPosts']); //list Blog 
    Route::get('/ListAllPosts', [PostsController::class,'ListAllPosts']); //list Blog 
    Route::get('/CheckPost', [PostsController::class,'CheckPost']); 
    Route::get('/deletePost', [PostsController::class,'deletePost']); //delete Blog 
    Route::get('/getPost', [PostsController::class,'getPost']); //get Post
    Route::post('/UpdatePost', [PostsController::class,'UpdatePost']); //Update Post


    Route::get('/ShowPermissionAll', [PermissionController::class,'ShowPermissionAll']); // get all permission
    Route::get('/CheckPermission', [PermissionController::class,'CheckPermission']); // check permmission
});





//dùng chung
Route::get('/listCategory', [Categories::class,'index']); //show
Route::get('/ShowImg/{filename}', [ImgController::class,'ShowImg']); //show img
Route::get('/InfoShow', [AllInfoWebController::class,'Show']); //Show info web


//user
Route::get('/ContactShow', [ContactController::class,'Show']); //Show contact





