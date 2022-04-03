<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;

class PostsController extends Controller
{
    public function AddPost(Request $request)
    {
        
        if($request->parent_id == "")
        {
            $name =  Category::where('id', 'like', '%'.$request->id.'%')->get("name");
            if($name[0]->name == "Blog")
            {
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
        }
        
    }
}
