<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Categories;
use App\Http\Controllers\API\ImgController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\AllInfoWebController;

Route::middleware('auth')->group(function (){
    Route::get('/listCategory', [Categories::class,'index']); //show
    Route::get('/Category', [Categories::class,'show']); //show one
    Route::get('/CategoryAll', [Categories::class,'showAll']); //show all
    Route::post('/newCategory', [Categories::class,'store']); //add
    Route::post('/DeleteCategory', [Categories::class,'destroy']); //delete
    Route::post('/UpdateCategory', [Categories::class,'update']); //update
    Route::post('/SearchCategory', [Categories::class,'search']); //search

    Route::post('/ContactEdit', [ContactController::class,'Edit']); //edit contact
    Route::get('/ContactShow', [ContactController::class,'Show']); //Show contact
    
    Route::get('/InfoShow', [AllInfoWebController::class,'Show']); //Show contact
    
    Route::post('/UploadImg', [ImgController::class,'uploadImg']); //upload img
});


Route::get('/ShowImg/{filename}', [ImgController::class,'ShowImg']); //show img




