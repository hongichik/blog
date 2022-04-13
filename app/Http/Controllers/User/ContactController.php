<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllInfoWeb;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $AllInfoWeb = AllInfoWeb::find(1);
        return  view('user.Contact',
            [
                "Gmail"=>$AllInfoWeb->GmailFooter,
                "numberFooter"=>$AllInfoWeb->numberFooter
            ]);
    }
}
