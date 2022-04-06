<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function ShowPermissionAll()
    {
        $user = request()->user();
        return $user->permissions;
    }

    public function CheckPermission(Request $request)
    {
        if($request->user()->hasPermission($request->Permission))
            return "1";
        return "0";
    }
}
