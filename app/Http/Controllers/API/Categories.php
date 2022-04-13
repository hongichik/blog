<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Posts;

class Categories extends Controller
{

    public function index()
    {
        $Categories = Category::whereNull('ParentId')->get();
        $arrayAll;
        foreach($Categories as $Category)
        {
            
            $arrayAll[] = array(
                'name' => $Category->name,
                'id' =>$Category->id,
                'Chill' =>$Category->ChillCategory,
            );
        }
        return response()->json($arrayAll);
    }
    public function ShowChild()
    {
        $Categories = Category::whereNull('ParentId')->get();
        $arrayAll;
        foreach($Categories as $Category)
        {
            $CategoryChilds = Category::where('ParentId', $Category->id)->get();
            foreach($CategoryChilds as $CategoryChild)
            {
                $arrayAll[] = array(
                    'name' => $CategoryChild->name,
                    'id' =>$Category->id,
                );
            }
        }
        return response()->json($arrayAll);
    }

    public function store(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Category')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 
        
        $validated = $request->validate([
            'name'=> 'required|unique:categories,name',
        ]);
        return  (bool)Category::create($request->all()); 

    }


    public function show(Request $request)
    {
        return Category::find($request->id);
    }

    public function showAll()
    {
        return Category::all();
    }



    public function update(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Category')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 
        
        $user = request()->user();
        if (!$request->user()->permissions('Manage-Category')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 
        $name =  Category::where('id', 'like', '%'.$request->id.'%')->get("name");
        if($name[0]->name == "Blog")
        {
            return;
        }
        $validated = $request->validate([
            'name'=> 'required',
        ]);
        $Category = Category::find($request->id);
        $Category->update($request->all());
        return $Category;
    }


    public function destroy(Request $request)
    {
        if (!$request->user()->hasPermission('Manage-Category')) {
            return response([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập vào chức năng này' 
            ], 200);
        } 
        
        $name =  Category::where('id',$request->id)->first();
        if($name->name == "Blog")
        {
            return;
        }

        //xóa bài post liên quan đến danh mục cha
        $Posts = Posts::where('category_id', $request->id)->get();
        foreach($Posts as $PostPather)
        {

            $Post = Posts::where('id', $PostPather->id)->first();
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


        }

        //xóa bài post liên quan đến danh mục con
        $CategoryChilds = Category::where('ParentId',$request->id)->get();
        foreach($CategoryChilds as $CategoryChild)
        {
            $Posts = Posts::where('category_id', $CategoryChild->id)->get();
            foreach($Posts as $PostPather)
            {

                $Post = Posts::where('id', $PostPather->id)->first();
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


            }

        }

        return Category::destroy($request->id);
    }

    public function search(Request $request)
    {
        // return $request;
        return Category::where('name', 'like', '%'.$request->name.'%')->get();
    }
}
