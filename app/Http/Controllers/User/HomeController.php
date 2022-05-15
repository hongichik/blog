<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $PostNew = Posts::orderBy("id",'DESC')->whereNull("parent_id")->first();
        $PostChilds = Posts::where('parent_id',$PostNew->id)->offset(0)->limit(3)->get();
        // return $Posts;
        $arrayNewChild=null;
        foreach($PostChilds as $PostChild)
        {
            $arrayNewChild[] = array(
                'name' => $PostChild->name,
                'summary' =>$PostChild->summary,
                'time'=>$PostChild->created_at,
                'image' =>'/api/ShowImg/'.$PostChild->image,
            );
        }
        $Hot =  array(
            'name' => $PostNew->name,
            'summary' =>$PostNew->summary,
            'image' =>'/api/ShowImg/'.$PostNew->image,
            'time'=>$PostNew->created_at,
            'arrayNewChilds' => $arrayNewChild,
        );
        $arrayPost=null;
        $Categoys = Category::where("name","!=","Blog")->whereNotNull("ParentId")->get();
        foreach($Categoys as $Categoy)
        {
            $Post = Posts::where('category_id',$Categoy->id)->offset(1)->limit(1)->first();
            $PostChilds = Posts::where('parent_id',$Post->id)->offset(1)->limit(4)->get();
            $arrayPostChild=null;
            foreach($PostChilds as $PostChild)
            {
                $arrayPostChild[] = array(
                    'name' => $PostChild->name,
                    'summary' =>$PostChild->summary,
                    'time'=>$PostChild->created_at,
                    'image' =>'/api/ShowImg/'.$PostChild->image,
                );
            }
            $arrayPost[] = array(
                'category' => $Categoy->name,
                'name' => $Post->name,
                'summary' =>$Post->summary,
                'time'=>$Post->created_at,
                'image' =>'/api/ShowImg/'.$Post->image,
                'arrayNewChild' => $arrayPostChild,
            );
        }
        // return $arrayPost;
        $Categoy = Category::where("name","Blog")->first();
        $Blogs = Posts::where('category_id',$Categoy->id)->offset(0)->limit(3)->get();
        $arrayBlog= null;
        foreach($Blogs as $Blog)
        {
            $arrayBlog[] = array(
                'name' => $Blog->name,
                'summary' =>$Blog->summary,
                'time'=>$Blog->created_at,
                'image' =>'/api/ShowImg/'.$Blog->image,
            );
        };
        
        $Posts = Posts::inRandomOrder()->limit(6)->get();
        $RamdomPosts =null;
        foreach($Posts as $Post)
        {
            $RamdomPosts[] = array(
                'name' => $Post->name,
                'summary' =>$Post->summary,
                'image' =>'/api/ShowImg/'.$Post->image,
                'time' =>$Post->created_at,
            );
        }


        return  view('user.Home',[
            "Hot" => $Hot,
            "arrayPosts" => $arrayPost,
            "arrayBlog" => $arrayBlog,
            "RamdomPosts" => $RamdomPosts,
        ]);
    }
}
