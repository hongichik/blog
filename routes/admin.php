<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\login;
use Illuminate\Support\Facades\Auth;
use App\Models\AllInfoWeb;

Route::get('/login', [login::class,'index'])->name('admin.login');
Route::get('/logout', [login::class,'logout']);

Route::post('/login', [login::class,'checkLogin']);


Route::middleware('auth')->group(function (){
    Route::get('/{any?}', function () {
        $AllInfoWeb = AllInfoWeb::find(1);
        return view('admin.admin',['name_admin'=> Auth::user()->name,'icon'=> $AllInfoWeb->icon ]);
    })->where('any', '.*?');
});