<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\MainController;

Route::get('/{any?}',  [MainController::class,'index'])->where('any', '.*?');
