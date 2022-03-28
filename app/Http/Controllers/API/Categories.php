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
        $validated = $request->validate([
            'name'=> 'required',
        ]);
        $Category = Category::find($request->id);
        $Category->update($request->all());
        return $Category;
    }


    public function destroy(Request $request)
    {
        return Category::destroy($request->id);
    }

    public function search(Request $request)
    {
        // return $request;
        return Category::where('name', 'like', '%'.$request->name.'%')->get();
    }
}
