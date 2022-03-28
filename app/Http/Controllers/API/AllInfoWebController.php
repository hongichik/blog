<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllInfoWeb;

class AllInfoWebController extends Controller
{
    public function Show()
    {
        $AllInfoWeb = AllInfoWeb::find(1);
        if($AllInfoWeb == "")
        {
            $AllInfoWeb = new AllInfoWeb();
            $AllInfoWeb->id = 1;
            $AllInfoWeb->logoHeader = '/api/ShowImg/logo.png';
            $AllInfoWeb->logoFooter  = '/api/ShowImg/logo2_footer.png';
            $AllInfoWeb->logoLoadPage  = '/api/ShowImg/logo.png';
            $AllInfoWeb->target  = 'Được phát triển nhằm mục đích toạn ra một công đồng cho sinh viên của trường Đại Học Hạ Long cùng nhau học hỏi và phát triển bản thân.';
            $AllInfoWeb->slogan = 'Học tập là đam mê';
            $AllInfoWeb->numberHeader = '0912345678';
            $AllInfoWeb->numberFooter    = '0912345678';
            $AllInfoWeb->GmailFooter  = 'hoctap@gmail.com';
            $AllInfoWeb->icon  = '/api/ShowImg/favicon.ico';
            $AllInfoWeb->memberOne  = 'Phạm Nguyên Hồng';
            $AllInfoWeb->menberTow  = 'Phạm Thế Anh';
            $AllInfoWeb->LinkFBFooter = 'LinkFBFooter';
            $AllInfoWeb->save();
            return $AllInfoWeb;
        }
        else
        {
            return $AllInfoWeb;
        }
    }
}
