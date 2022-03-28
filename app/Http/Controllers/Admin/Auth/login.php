<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AllInfoWeb;

class login extends Controller
{
    public function index(Request $request)
    {
        $AllInfoWeb = AllInfoWeb::find(1);
        return view('admin.login',['icon'=> $AllInfoWeb->icon ]);
    }

    public function checkLogin(Request $request)
    {

        $validated = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:6',
        ]);
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return response()->json(
                [
                    'error' => 'Email hoặc mật khẩu sai', 
                ]
            );
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
