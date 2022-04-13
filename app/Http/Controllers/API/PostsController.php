<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Posts;
use App\Models\Category;
use App\Models\User;

class PostsController extends Controller
{
    public function UpdatePost(Request $request)
    {
        $post = Posts::where('id', $request->id)->first();
        if($request->image != "0")
        {
            //upload image
            $path = public_path() . '/uploads/images/';
            File::delete($path.$post->image);
            if(!$request->hasFile('image')) {
                return response()->json(['Tải ảnh lên thất bại'], 400);
            }
            $file = $request->file('image');
            if(!$file->isValid()) {
                return response()->json(['Tải ảnh lên thất bại'], 400);
            }

            $fileNameImg = uniqid().'.'.$file->getClientOriginalExtension();
            while(file_exists($path.$fileNameImg))
            {
                $fileNameImg = uniqid().'.'.$file->getClientOriginalExtension();
            }
            $file->move($path, $fileNameImg);
            $post->image = $fileNameImg;
        }

        if(isset($request->content))
        {

            $pathContent = public_path().'/uploads/blog/'.$post->content;
            $contentTow = file_get_contents($pathContent);

            while(strstr($contentTow,"/api/ShowImg/",false))
            {
                $a = strstr($contentTow,"/api/ShowImg/",false);
                $contentTow = $a;
                $a = strstr($a,'"',true);
                $contentTow = str_replace( $a, '', $contentTow );
                $image_path = public_path().'/uploads/images/'.str_replace( '/api/ShowImg/', '', $a ); // ảnh cũ
                if(strpos($request->content, $image_path) == false)
                {
                    File::delete($image_path);
                }
            }


            $pathContent = fopen($pathContent, 'w');
            fwrite($pathContent, $request->content);
            fclose($pathContent);
        }
        $post->name = $request->name;
        $post->summary = $request->summary;
        $post->save();
        return "1";
    }
    public function getPost(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Personal-Posts')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 
        $post = Posts::where('id', $request->id)->first();
        if($post->content != null)
        {
            $pathContent = public_path().'/uploads/blog/'.$post->content;
            $container = file_get_contents($pathContent);
            return response([
                "name" => $post->name,
                "image" => $post->image,
                "summary" => $post->summary,
                "content" => $container,
            ]);
        }
        return response([
            "name" => $post->name,
            "image" => $post->image,
            "summary" => $post->summary,
        ]);

    }
    public function AddBlog(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Personal-Posts')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 

        //add new file .blog
        $path = public_path() . '/uploads/blog/';
        $fileNameBlog = uniqid().'.blog';
        while(file_exists($path.$fileNameBlog))
        {
            $fileNameBlog = uniqid().'.blog';
        }
        $fullname = $path.$fileNameBlog;
        $fileBlog = fopen($fullname, "x"); // open file just for write
        fwrite($fileBlog, $request->content); // write file
        fclose($fileBlog); // close file

        //new image
        if(!$request->hasFile('image')) {
            return response()->json(['Tải ảnh lên thất bại'], 400);
        }
        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json(['Tải ảnh lên thất bại'], 400);
        }
        $path = public_path() . '/uploads/images/';
        $fileNameImg = uniqid().'.'.$file->getClientOriginalExtension();
        while(file_exists($path.$fileNameImg))
        {
            $fileNameImg = uniqid().'.'.$file->getClientOriginalExtension();
        }
        $file->move($path, $fileNameImg);
        
        $Posts = new Posts();
        $Posts->name = $request->name;
        $Posts->category_id = $request->category_id;
        $Posts->image = $fileNameImg;
        $Posts->summary = $request->summary;
        $Posts->content = $fileNameBlog;
        $Posts->user_id = $request->user()->id;
        $Posts->save();
        return $Posts;
        
        
    }

    public function AddPost(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Personal-Posts')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 

        if($request->parent_id == "")
        {
            //new image
            if(!$request->hasFile('image')) {
                return response()->json(['Tải ảnh lên thất bại'], 400);
            }
            $file = $request->file('image');
            if(!$file->isValid()) {
                return response()->json(['Tải ảnh lên thất bại'], 400);
            }
            $path = public_path() . '/uploads/images/';
            $fileNameImg = uniqid().'.'.$file->getClientOriginalExtension();
            while(file_exists($path.$fileNameImg))
            {
                $fileNameImg = uniqid().'.'.$file->getClientOriginalExtension();
            }
            $file->move($path, $fileNameImg);
            // return $request->name."  ".$request->category_id."   ".$fileNameImg."   ".$request->summary."   ".$request->user()->id;

            $Posts = new Posts();
            $Posts->name = $request->name;
            $Posts->category_id = $request->category_id;
            $Posts->image = $fileNameImg;
            $Posts->summary = $request->summary;
            $Posts->user_id = $request->user()->id;
            $Posts->save();
            return $Posts;
        }
        
    }


    public function AddChildPost(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Personal-Posts')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 

        //add new file .blog
        $path = public_path() . '/uploads/blog/';
        $fileNameChildPost = uniqid().'.blog';
        while(file_exists($path.$fileNameChildPost))
        {
            $fileNameChildPost = uniqid().'.blog';
        }
        $fullname = $path.$fileNameChildPost;
        $fileChildPost = fopen($fullname, "x"); // open file just for write
        fwrite($fileChildPost, $request->content); // write file
        fclose($fileChildPost); // close file

        //new image
        if(!$request->hasFile('image')) {
            return response()->json(['Tải ảnh lên thất bại'], 400);
        }
        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json(['Tải ảnh lên thất bại'], 400);
        }
        $path = public_path() . '/uploads/images/';
        $fileNameImg = uniqid().'.'.$file->getClientOriginalExtension();
        while(file_exists($path.$fileNameImg))
        {
            $fileNameImg = uniqid().'.'.$file->getClientOriginalExtension();
        }
        $file->move($path, $fileNameImg);

        $Posts = new Posts();
        $Posts->name = $request->name;
        $Posts->image = $fileNameImg;
        $Posts->summary = $request->summary;
        $Posts->content = $fileNameChildPost;
        $Posts->parent_id = $request->parent_id;
        $Posts->user_id = $request->user()->id;
        $Posts->save();
        return $Posts;
        
        
    }

    public function CheckPost(Request $request)
    {
        if((bool) Posts::where('id', $request->id)->count())
        {
            return "1";
        }
        return "0";
    }

    public function ListPosts(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Personal-Posts')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 

        $categories = new Category();
        $categories = $categories->whereNotNull("ParentId")->orWhere("name","Blog")->get(["id","name"]);

        $arrayAll;
        foreach ($categories as $Category)
        {
            $arrayPosts = null;
            
            $Posts = Posts::where('category_id',$Category->id)->where('user_id',$request->user()->id)->orderBy('id', 'DESC')->get();
            foreach($Posts as $Post){
                $ArrayPostChilds;
                $PostChilds = Posts::where('parent_id',$Post->id)->where('user_id',$request->user()->id)->orderBy('id', 'DESC')->get();
                if(count($PostChilds))
                {
                    foreach($PostChilds as $PostChild)
                    {
                        $ArrayPostChilds[] = array(
                            'name' => $PostChild->name,
                            'image' =>'/api/ShowImg/'.$PostChild->image,
                            'summary'=>$PostChild->summary,
                            'content'=>$PostChild->content,
                            'id' => $PostChild->id,
                        );
                    }
                }
                else
                {
                    $ArrayPostChilds = null;
                }
                $arrayPosts[] = array(
                    'name' => $Post->name,
                    'image' =>'/api/ShowImg/'.$Post->image,
                    'summary'=>$Post->summary,
                    'content'=>$Post->content,
                    'id' =>$Post->id,
                    'PostChilds' => $ArrayPostChilds,
                );
                $ArrayPostChilds=null;
            }
            $arrayAll[] = array(
                'name' => $Category->name,
                'Post' => $arrayPosts,
                'id' => $Category->id,
            );
            $arrayPosts = null;
        }
        return response()->json($arrayAll);
    }


    public function ListAllPosts(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Posts-All')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 

        $categories = new Category();
        $categories = $categories->whereNotNull("ParentId")->orWhere("name","Blog")->get(["id","name"]);

        $arrayAll;
        foreach ($categories as $Category)
        {
            $arrayPosts = null;
            
            $Posts = Posts::where('category_id',$Category->id)->orderBy('id', 'DESC')->get();
            foreach($Posts as $Post){
                $ArrayPostChilds;
                $PostChilds = Posts::where('parent_id',$Post->id)->orderBy('id', 'DESC')->get();
                if(count($PostChilds))
                {
                    foreach($PostChilds as $PostChild)
                    {
                        if($PostChild->user_id != null)
                        {
                            $nameAdmin = User::where('id', $PostChild->user_id )->get("name")->first()->name;
                        }
                        else
                        {
                            $nameAdmin = "Không có thông tin";
                        }
                        $ArrayPostChilds[] = array(
                            'name' => $PostChild->name,
                            'image' =>'/api/ShowImg/'.$PostChild->image,
                            'summary'=>$PostChild->summary,
                            'content'=>$PostChild->content,
                            'id' => $PostChild->id,
                            'WriterName' => $nameAdmin,
                        );
                    }
                }
                else
                {
                    $ArrayPostChilds = null;
                }

                if($Post->user_id != null)
                {
                    $nameAdmin = User::where('id', $Post->user_id )->get("name")->first()->name;
                }
                else
                {
                    $nameAdmin = "Không có thông tin";
                }
                $arrayPosts[] = array(
                    'name' => $Post->name,
                    'image' =>'/api/ShowImg/'.$Post->image,
                    'summary'=>$Post->summary,
                    'content'=>$Post->content,
                    'id' =>$Post->id,
                    'PostChilds' => $ArrayPostChilds,
                    'WriterName' => $nameAdmin,
                );
                $ArrayPostChilds = null;
            }
            $arrayAll[] = array(
                'name' => $Category->name,
                'Post' => $arrayPosts,
                'id' => $Category->id,
            );
            $arrayPosts = null;
        }
        return response()->json($arrayAll);
    }

    public function deletePost(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Personal-Posts')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 

        $Post = Posts::where('id', $request->id)->first();
        $PostChilds = Posts::where('parent_id', $Post->id)->get();
        foreach($PostChilds as $PostChild)
        {   
            // delete img
            $image_path = public_path().'/uploads/images/'.$PostChild->image; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            if(!$PostChild->content == null) // delete img in content
            {
                $content_path = public_path().'/uploads/blog/'.$PostChild->content;
                $content = file_get_contents($content_path);

                while(strstr($content,"/api/ShowImg/",false))
                {
                    $a = strstr($content,"/api/ShowImg/",false);
                    $content = $a;
                    $a = strstr($a,'"',true);
                    $content = str_replace( $a, '', $content );
                    $image_path = public_path().'/uploads/images/'.str_replace( '/api/ShowImg/', '', $a );
                    File::delete($image_path);
                }
                File::delete($content_path);
            }
        }
        // delete img
        $image_path = public_path().'/uploads/images/'.$Post->image; 
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        if(!$Post->content == null) // delete img in content
        {
            $content_path = public_path().'/uploads/blog/'.$Post->content;
            $content = file_get_contents($content_path);
    
            while(strstr($content,"/api/ShowImg/",false))
            {
                $a = strstr($content,"/api/ShowImg/",false);
                $content = $a;
                $a = strstr($a,'"',true);
                $content = str_replace( $a, '', $content );
                $image_path = public_path().'/uploads/images/'.str_replace( '/api/ShowImg/', '', $a );
                File::delete($image_path);
            }
            File::delete($content_path);
        }
        $Post->delete();
        return 0;
    }
}
