<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\AllInfoWeb;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $AllInfoWeb = new AllInfoWeb();
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
        

        $Category1 = new Category();
        $Category1->name = 'danh mục cha';
        $Category1->save();

        $Category2 = new Category();
        $Category2->name = 'danh mục con';
        $Category2->ParentCategory()->associate($Category1);
        $Category2->save();


        $admin_1_create = new User();
        $admin_1_create->name = 'Phạm nguyên hồng';
        $admin_1_create->email = 'admin1@gmail.com';
        $admin_1_create->password = bcrypt('admin1');
        $admin_1_create->save();


        $admin_2_create = new User();
        $admin_2_create->name = 'Phạm thế anh';
        $admin_2_create->email = 'admin2@gmail.com';
        $admin_2_create->password = bcrypt('admin2');
        $admin_2_create->save();

    }
}
