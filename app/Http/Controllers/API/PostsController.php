<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;

class PostsController extends Controller
{
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

            $Posts = new Posts();
            $Posts->name = $request->name;
            $Posts->category_id = $request->category_id;
            $Posts->image = $fileNameImg;
            $Posts->summary = $request->summary;
            $Posts->save();
            return $Posts;
        }
        
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
        $categories = $categories->get(["id","name"])->all();

        $arrayAll;
        foreach ($categories as $Category)
        {
            $arrayPosts = null;
            
            $Posts = Posts::where('category_id',$Category->id)->get();
            foreach($Posts as $Post){
                $ArrayPostChilds;
                $PostChilds = Posts::where('parent_id',$Post->id)->get();
                if(count($PostChilds))
                {
                    foreach($PostChilds as $PostChild)
                    {
                        $ArrayPostChilds[] = array(
                            'name' => $PostChild->name,
                            'image' =>'/api/ShowImg/'.$PostChild->image,
                            'summary'=>$PostChild->summary,
                            'content'=>$PostChild->content,
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
                    'PostChilds' => $ArrayPostChilds,
                );
            }
            $arrayAll[] = array(
                'name' => $Category->name,
                'Post' => $arrayPosts,
                'id' => $Category->id,
            );
        }
        return response()->json($arrayAll);
    }
}
