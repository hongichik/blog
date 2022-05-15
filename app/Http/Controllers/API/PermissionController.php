<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;

class PermissionController extends Controller
{
    public function UpdateAcount(Request $request)
    {
        if($request->pass != "demo")
        {
            $User_update =User::where('id',$request->id)->update(['name' => $request->Fullname,'email' => $request->Gmail,'password' => bcrypt($request->Pass)]);
        }
        else
        {
            $User_update= User::where('id',$request->id)->update(['name' => $request->Fullname,'email' => $request->Gmail]);
        }
        $updatePer = User::where('id',$request->id)->first();
        return $updatePer->permissions()->sync(array_map('intval', explode(",", $request->Permission)));
         
    }
    public function GetInfoAcount(Request $request)
    {
        return User::where('id',$request->id)->first();
    }
    public function GetInfoAcountPer(Request $request)
    {
        return User::where('id',$request->id)->first()->permissions;
    }
    public function DeleteAcount(Request $request){
        return User::where('id',$request->id)->delete();
    }
    public function GetAllAdmin()
    {
        return User::all();
    }
    public function NewAccount(Request $request)
    {
        $admin_create = new User();
        $admin_create->name = $request->Fullname;
        $admin_create->email = $request->Gmail;
        $admin_create->password = bcrypt($request->Pass);
        $admin_create->save();
        $admin_create->permissions()->sync(array_map('intval', explode(",", $request->Permission)));
        return true;
    }
    public function GetPermisson()
    {
        return Permission::All();
    }
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
