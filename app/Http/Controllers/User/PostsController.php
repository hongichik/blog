<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Support\Facades\Response;

class PostsController extends Controller
{
    public function CategoryChild(Request $request, $Category, $CategoryChild,$page)
    {
        $RamdomPosts= null;
        $Posts = Posts::inRandomOrder()->limit(5)->get();

        foreach($Posts as $Post)
        {
            $RamdomPosts[] = array(
                'name' => $Post->name,
                'summary' =>$Post->summary,
                'image' =>'/api/ShowImg/'.$Post->image,
            );
        }

        if($Category == "Blog"){
            $post = Posts::where("name",$CategoryChild)->first();
            if($post == null)
            {
                return redirect('/');
            }
            $path = public_path().'/uploads/blog/'.$post->content;
            
    
            $arraypostChild = null;

            $container = file_get_contents($path);
    
    
            $CategoryId = Category::where('name',$Category)->get("id")->first();
            if($CategoryId == null)
            {
                return redirect('/');
            }
            else{
                $CategoryId = $CategoryId->id;
            }
    
            $arrayPosts= null;
            $Posts = Posts::where('category_id',$CategoryId)->offset(0)->limit(5)->get();
    
            foreach($Posts as $Post)
            {
                $arrayPosts[] = array(
                    'name' => $Post->name,
                    'summary' =>$Post->summary,
                    'image' =>'/api/ShowImg/'.$Post->image,
                );
            }
    
    
            $paths[] = array(
                "path" => '../'.$Category,
                "name" => $Category
            );
            $paths[] = array(
                "path" => $CategoryChild,
                "name" => ""
            );

            return view('user.post',[
                "paths"=> $paths,
                "name"=> $post->name,
                "container" => $container,
                "arraypostChild" => $arraypostChild,
                "arrayPosts" => $arrayPosts,
            ]);
        }
        else
        {
            $CategoryId = Category::where('name',$Category)->get("id")->first();
            if($CategoryId == null)
            {
                return redirect('/');
            }
            $numberPage = 10;
            $countPage=0;
            $arrayPosts=null;
            $CategoryId = Category::where('name',$CategoryChild)->get("id")->first();
            if($CategoryId == null)
            {
                $Posts = Posts::where('name',$CategoryChild)->first();
                if($Posts == [])
                {
                    return redirect('/');
                }
                $CategoryId = Category::where('id',$Posts->category_id)->first();
                return redirect(str_replace('+','%20',urlencode($Category).'/'.urlencode($CategoryId->name).'/'.urlencode($CategoryChild).'/1'));
            }
            else{
                $CategoryId = $CategoryId->id;
            }
    
    
            $countPost = Posts::where('category_id',$CategoryId)->count();
            
            if($countPost == 0)
            {
                return View('user.posts',[
                    "error"=>"Tạm thời chưa có bài viết nào",
                    "RamdomPosts" => $RamdomPosts,
                ]);
            }
    
            $countPage = $countPage + $countPost;
            if($countPage > ($page*$numberPage-$numberPage)  )
            {
                if($page == 1)
                {
                    $Posts = Posts::where('category_id',$CategoryId)->offset(0)->limit($numberPage)->get();
                }
                else
                {
                    $Posts = Posts::where('category_id',$CategoryId)->offset($countPage-($page*$numberPage-$numberPage-1))->limit($numberPage)->get();
                }
                foreach($Posts as $Post)
                {
                    $arrayPosts[] = array(
                        'name' => $Post->name,
                        'summary' =>$Post->summary,
                        'image' =>'/api/ShowImg/'.$Post->image,
                    );
                }
            }
    
            $countPage  = ceil($countPage/$numberPage);
            if($arrayPosts == null)
            {
                return redirect('/');
            }
    
            $paths[] = array(
                "path" => '../'.$Category,
                "name" => $Category
            );
            $paths[] = array(
                "path" => $CategoryChild,
                "name" => $CategoryChild
            );
    
            
            return View('user.posts',[
                "paths" => $paths,
                "arrayPosts" => $arrayPosts,
                "countPage" => $countPage,
                "page" =>$page,
                "RamdomPosts" => $RamdomPosts,
            ]);
        }
    }

    public function Category(Request $request, $Category,$page)
    {
        $RamdomPosts= null;
        $Posts = Posts::inRandomOrder()->limit(5)->get();

        foreach($Posts as $Post)
        {
            $RamdomPosts[] = array(
                'name' => $Post->name,
                'summary' =>$Post->summary,
                'image' =>'/api/ShowImg/'.$Post->image,
            );
        }

        if($Category == "Blog")
        {
            $numberPage = 10;
            $countPage=0;
            $arrayPosts=null;
            $CategoryId = Category::where('name',$Category)->get("id")->first();
            $countPost = Posts::where('category_id',$CategoryId->id)->count();
            if($countPost == 0)
            {
                return View('user.posts',[
                    "error"=>"Tạm thời chưa có bài viết nào",
                ]);
            }
            else
            {
                $CategoryId = $CategoryId->id;
            }
    
            $countPage = $countPage + $countPost;
            if($countPage > ($page*$numberPage-$numberPage)  )
            {
                if($page == 1)
                {
                    $Posts = Posts::where('category_id',$CategoryId)->offset(0)->limit($numberPage)->get();
                }
                else
                {
                    $Posts = Posts::where('category_id',$CategoryId)->offset(($page*$numberPage-$numberPage))->limit($numberPage)->get();
                }
                foreach($Posts as $Post)
                {
                    $arrayPosts[] = array(
                        'name' => $Post->name,
                        'summary' =>$Post->summary,
                        'image' =>'/api/ShowImg/'.$Post->image,
                    );
                }
            }
    
            $countPage  = ceil($countPage/$numberPage);
            if($arrayPosts == null)
            {
                return redirect('/');
            }
    
            $paths[] = array(
                "path" => $Category,
                "name" => $Category
            );
    
            return View('user.posts',[
                "paths" => $paths,
                "arrayPosts" => $arrayPosts,
                "countPage" => $countPage,
                "page" =>$page,
                "RamdomPosts" => $RamdomPosts,
            ]);
        }
        else
        {
            $numberPage = 10;
            $countPage=0;
            $arrayPosts=null;
    
            $CategoryId = Category::where('name',$Category)->get("id")->first();
            if($CategoryId == null)
            {
                return redirect('/');
            }
            else{
                $CategoryId = $CategoryId->id;
            }
    
            $countPost = Posts::where('category_id',$CategoryId)->count();
            $countPage = $countPage + $countPost;
            if($countPage > ($page*$numberPage-$numberPage)  )
            {
                if($page == 1)
                {
                    $Posts = Posts::where('category_id',$CategoryId)->offset(0)->limit($numberPage)->get();
                }
                else
                {
                    $Posts = Posts::where('category_id',$CategoryId)->offset($countPage-($page*$numberPage-$numberPage-1))->limit($numberPage)->get();
                }
                foreach($Posts as $Post)
                {
                    $arrayPosts[] = array(
                        'name' => $Post->name,
                        'summary' =>$Post->summary,
                        'image' =>'/api/ShowImg/'.$Post->image,
                    );
                }
            }
    

    
            $CategoryChildIds = Category::where('ParentId',$CategoryId)->get();
            if($CategoryChildIds->count() !=0)
            {
                foreach($CategoryChildIds as $CategoryChildId)
                {                
                    $countPost = Posts::where('category_id',$CategoryChildId->id)->count();
                    $countPage = $countPage + $countPost;
                    if($countPage > ($page*$numberPage-$numberPage)  )
                    {
                        if($page == 1)
                        {
                            $Posts = Posts::where('category_id',$CategoryChildId->id)->offset(0)->limit($numberPage)->get();
                        }
                        else
                        {
                            $Posts = Posts::where('category_id',$CategoryChildId->id)->offset($countPage-($page*$numberPage-$numberPage-1))->limit($numberPage)->get();
                        }
                        foreach($Posts as $Post)
                        {
                            $arrayPosts[] = array(
                                'name' => $Post->name,
                                'summary' =>$Post->summary,
                                'image' =>'/api/ShowImg/'.$Post->image,
                            );
                        }
                    }
                }
                
                $countPage  = ceil($countPage/$numberPage);
                if($arrayPosts == null)
                {
                    return View('user.posts',[
                        "error"=>"Tạm thời chưa có bài viết nào",
                        "RamdomPosts" => $RamdomPosts,
                    ]);
                }
                $paths[] = array(
                    "path" => $Category,
                    "name" => $Category
                );


                
                return View('user.posts',[
                    "paths" => $paths,
                    "arrayPosts" => $arrayPosts,
                    "countPage" => $countPage,
                    "page" =>$page,
                    "RamdomPosts" => $RamdomPosts,
                ]);
            }
            else
            {
                return View('user.posts',[
                    "error"=>"Tạm thời chưa có bài viết nào",
                    "RamdomPosts" => $RamdomPosts,
                ]);
            }
        }
        
    }

    public function Posts(Request $request, $Category, $CategoryChild, $posts,$page)
    {
        $numberPage = 10;
        $countPage=0;
        $arrayPosts=null;
        
        $CategoryId = Category::where('name',$Category)->get("id")->first();
        if($CategoryId == null)
        {
            return redirect('/');
        }
        $CategoryId = Category::where('name',$CategoryChild)->get("id")->first();
        if($CategoryId == null)
        {
            return redirect('/');

        }
        $PostsId = Posts::where('name',$posts)->get("id")->first();
        if($PostsId == null)
        {
            return redirect('/');
        }
        else{
            $PostsId = $PostsId->id;
        }


        $RamdomPosts= null;
        $Posts = Posts::inRandomOrder()->limit(5)->get();

        foreach($Posts as $Post)
        {
            $RamdomPosts[] = array(
                'name' => $Post->name,
                'summary' =>$Post->summary,
                'image' =>'/api/ShowImg/'.$Post->image,
            );
        }


        $countPost = Posts::where('parent_id',$PostsId)->count();
        
        if($countPost == 0)
        {
            return View('user.posts',[
                "error"=>"Tạm thời chưa có bài viết nào",
                "RamdomPosts" => $RamdomPosts
            ]);
        }

        $countPage = $countPage + $countPost;
        if($countPage > ($page*$numberPage-$numberPage)  )
        {
            if($page == 1)
            {
                $Posts = Posts::where('parent_id',$PostsId)->offset(0)->limit($numberPage)->get();
            }
            else
            {
                $Posts = Posts::where('parent_id',$PostsId)->offset($countPage-($page*$numberPage-$numberPage-1))->limit($numberPage)->get();
            }
            foreach($Posts as $Post)
            {
                $arrayPosts[] = array(
                    'name' => $Post->name,
                    'summary' =>$Post->summary,
                    'image' =>'/api/ShowImg/'.$Post->image,
                );
            }
        }

        $countPage  = ceil($countPage/$numberPage);
        if($arrayPosts == null)
        {
            return redirect('/');
        }
        $paths[] = array(
            "path" => '../../'.$Category,
            "name" => $Category
        );
        $paths[] = array(
            "path" => '../'.$CategoryChild,
            "name" => $CategoryChild
        );
        $paths[] = array(
            "path" => $posts,
            "name" => $posts
        );


        return View('user.posts',[
            "paths" => $paths,
            "arrayPosts" => $arrayPosts,
            "countPage" => $countPage,
            "page" =>$page,
            "RamdomPosts" => $RamdomPosts,
        ]);
    }


    public function Post(Request $request, $Category, $CategoryChild, $posts,$post,$page)
    {
        $CategoryId = Category::where('name',$Category)->get("id")->first();
        if($CategoryId == null)
        {
            return redirect('/');
        }
        $CategoryId = Category::where('name',$CategoryChild)->get("id")->first();
        if($CategoryId == null)
        {
            return redirect('/');

        }
        $PostsId = Posts::where('name',$posts)->get("id")->first();
        if($PostsId == null)
        {
            return redirect('/');
        }



        $post = Posts::where("name",$post)->first();
        if($post == null)
        {
            return redirect('/');
        }
        $path = public_path().'/uploads/blog/'.$post->content;
        

        $Posts = Posts::where("name",$posts)->first();
        $Posts = Posts::where("parent_id",$Posts->id)->get();
        $arraypostChild = null;
        foreach($Posts as $PostChild)
        {
            $arraypostChild[] = array(
                'name' => $PostChild->name,
            );
        }
        $container = file_get_contents($path);


        $CategoryId = Category::where('name',$CategoryChild)->get("id")->first();
        if($CategoryId == null)
        {
            return redirect('/');
        }
        else{
            $CategoryId = $CategoryId->id;
        }

        $arrayPosts= null;
        $Posts = Posts::where('category_id',$CategoryId)->offset(0)->limit(5)->get();

        foreach($Posts as $Post)
        {
            $arrayPosts[] = array(
                'name' => $Post->name,
                'summary' =>$Post->summary,
                'image' =>'/api/ShowImg/'.$Post->image,
            );
        }


        $paths[] = array(
            "path" => '../../../'.$Category,
            "name" => $Category
        );
        $paths[] = array(
            "path" => '../../'.$CategoryChild,
            "name" => $CategoryChild
        );
        $paths[] = array(
            "path" => '../'.$posts,
            "name" => $posts
        );
        $paths[] = array(
            "path" => $post->name,
            "name" => ""
        );
        return view('user.post',[
            "paths"=> $paths,
            "name"=> $post->name,
            "container" => $container,
            "posts" => strtolower($posts),
            "arraypostChild" => $arraypostChild,
            "arrayPosts" => $arrayPosts
        ]);
    }




    public function Search(Request $request, $keySearch,$page)
    {
        $RamdomPosts= null;
        $Posts = Posts::inRandomOrder()->limit(5)->get();

        foreach($Posts as $Post)
        {
            $RamdomPosts[] = array(
                'name' => $Post->name,
                'summary' =>$Post->summary,
                'image' =>'/api/ShowImg/'.$Post->image,
            );
        }


        $numberPage = 10;
        $countPage=0;
        $arrayPosts=null;
        $countPost = Posts::where('name', 'like', '%'.$keySearch.'%')->count();
        if($countPost == 0)
        {
            return View('user.posts',[
                "error"=>"Không tìm thấy bài viết",
                "RamdomPosts" => $RamdomPosts,
            ]);
        }


        $countPage = $countPage + $countPost;
        if($countPage > ($page*$numberPage-$numberPage)  )
        {
            if($page == 1)
            {
                $Posts = Posts::where('name', 'like', '%'.$keySearch.'%')->offset(0)->limit($numberPage)->get();
            }
            else
            {
                $Posts = Posts::where('name', 'like', '%'.$keySearch.'%')->offset($countPage-($page*$numberPage-$numberPage-1))->limit($numberPage)->get();
            }
            foreach($Posts as $Post)
            {
                $arrayPosts[] = array(
                    'name' => $Post->name,
                    'summary' =>$Post->summary,
                    'image' =>'/api/ShowImg/'.$Post->image,
                );
            }
        }

        $countPage  = ceil($countPage/$numberPage);
        if($arrayPosts == null)
        {
            return redirect('/');
        }

        $paths[] = array(
            "path" => $keySearch,
            "name" => 'Từ khóa tìm kiếm - '.$keySearch
        );


        return View('user.posts',[
            "paths" => $paths,
            "arrayPosts" => $arrayPosts,
            "countPage" => $countPage,
            "page" =>$page,
            "RamdomPosts" => $RamdomPosts,
        ]);
        
    }

    public function NaviPost(Request $request,$keyPost)
    {
        $Posts = Posts::where('name', $keyPost)->first();
        if($Posts->category_id  != null)
        {
            $Category = Category::where('id', $Posts->category_id)->first();
            if($Category->name == "Blog")
            {
                $url = "Blog".'/'.urlencode($keyPost)."/1";
                return redirect(str_replace('+','%20',$url));
            }
            else
            {
                if($Category->ParentId != null)
                {
                    $CategoryParent = Category::where('id', $Category->ParentId)->first();
                    $url = urlencode($CategoryParent->name).'/'.urlencode($Category->name).'/'.urlencode($keyPost)."/1";
                    return redirect(str_replace('+','%20',$url));
                }
                else{
                    $url = urlencode($Category->name).'/'.urlencode($keyPost)."/1";
                    return redirect(str_replace('+','%20',$url));
                }

            }
        }
        else
        {
            $PostParent = Posts::where('id', $Posts->parent_id)->first();
            $Category = Category::where('id', $PostParent->category_id)->first();

            if($Category->ParentId != null)
            {
                $CategoryParent = Category::where('id', $Category->ParentId)->first();
                $url = urlencode($CategoryParent->name).'/'.urlencode($Category->name).'/'.urlencode($PostParent->name).'/'.urlencode($keyPost)."/1";
                return redirect(str_replace('+','%20',$url));
            }
            else{
                $url = urlencode($Category->name).'/'.urlencode($PostParent->name).'/'.urlencode($keyPost)."/1";
                return redirect(str_replace('+','%20',$url));
            }

            
        }

    }
}
