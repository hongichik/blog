<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllInfoWeb;

class MainController extends Controller
{
    public function index()
    {
        $AllInfoWeb = AllInfoWeb::find(1);

        return view('user.Main', 
        [
            'target' => $AllInfoWeb->target,
            'logoHeader'=> $AllInfoWeb->logoHeader ,
            'logoFooter'=> $AllInfoWeb->logoFooter ,
            'logoLoadPage'=> $AllInfoWeb->logoLoadPage ,
            'slogan'=> $AllInfoWeb->slogan ,
            'numberHeader'=> $AllInfoWeb->numberHeader ,
            'numberFooter'=> $AllInfoWeb->numberFooter ,
            'GmailFooter'=> $AllInfoWeb->GmailFooter ,
            'icon'=> $AllInfoWeb->icon ,
            'memberOne'=> $AllInfoWeb->memberOne ,
            'menberTow'=> $AllInfoWeb->menberTow ,
            'LinkFBFooter'=> $AllInfoWeb->LinkFBFooter ,
        ] 
        );
    }
}
