<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\AllInfoWeb;
use App\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $ManageCategory = new Permission();
        $ManageCategory->name = 'Quản lý danh mục';
        $ManageCategory->slug = 'Manage-Category';
        $ManageCategory->save();

        $ManagePersonalPosts = new Permission();
        $ManagePersonalPosts->name = 'Quản lý bài viết cá nhân';
        $ManagePersonalPosts->slug = 'Manage-Personal-Posts';
        $ManagePersonalPosts->save();

        $ManagePostsAll = new Permission();
        $ManagePostsAll->name = 'Quản lý tất cả bài viết';
        $ManagePostsAll->slug = 'Manage-Posts-All';
        $ManagePostsAll->save();

        $ManageInfoWeb = new Permission();
        $ManageInfoWeb->name = 'Quản lý thông tin của web';
        $ManageInfoWeb->slug = 'Manage-Info-Web';
        $ManageInfoWeb->save();

        $ManageAccount = new Permission();
        $ManageAccount->name = 'Quản lý tài khoản';
        $ManageAccount->slug = 'Manage-Account';
        $ManageAccount->save();

        $ManageLayoutHome = new Permission();
        $ManageLayoutHome->name = 'Quản lý bố cục trang chủ';
        $ManageLayoutHome->slug = 'Manage-Layout-Home';
        $ManageLayoutHome->save();


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
        
        $Category = new Category();
        $Category->name = 'Blog';
        $Category->save();

        $Category1 = new Category();
        $Category1->name = 'Lập trình';
        $Category1->save();


        $Category2 = new Category();
        $Category2->name = 'C++';
        $Category2->ParentCategory()->associate($Category1);
        $Category2->save();


        $admin_1_create = new User();
        $admin_1_create->name = 'Phạm nguyên hồng';
        $admin_1_create->email = 'admin1@gmail.com';
        $admin_1_create->password = bcrypt('admin1');
        $admin_1_create->save();
        $admin_1_create->permissions()->attach($ManageCategory);
        $admin_1_create->permissions()->attach($ManagePersonalPosts);
        $admin_1_create->permissions()->attach($ManagePostsAll);
        $admin_1_create->permissions()->attach($ManageInfoWeb);
        $admin_1_create->permissions()->attach($ManageAccount);
        $admin_1_create->permissions()->attach($ManageLayoutHome);


        $admin_2_create = new User();
        $admin_2_create->name = 'Phạm thế anh';
        $admin_2_create->email = 'admin2@gmail.com';
        $admin_2_create->password = bcrypt('admin2');
        $admin_2_create->save();
        $admin_2_create->permissions()->attach($ManagePersonalPosts);

    }
}
