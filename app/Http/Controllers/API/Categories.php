<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

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
        $name =  Category::where('id', 'like', '%'.$request->id.'%')->get("name");
        if($name[0]->name == "Blog")
        {
            return;
        }
        return Category::destroy($request->id);
    }

    public function search(Request $request)
    {
        // return $request;
        return Category::where('name', 'like', '%'.$request->name.'%')->get();
    }
}
