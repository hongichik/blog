<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ImgController extends Controller
{
    public function uploadImg(Request $request)
    {
        if(!$request->hasFile('upload')) {
            return response()->json(['Tải ảnh lên thất bại'], 400);
        }
        $file = $request->file('upload');
        if(!$file->isValid()) {
            return response()->json(['Tải ảnh lên thất bại'], 400);
        }

        $expensions= array("jpeg","jpg","png","PNG","ico");
            
        if(in_array($file->getClientOriginalExtension(),$expensions)=== false){
            return response()->json(['Chỉ hỗ trợ ảnh jpeg, jpg, png'], 400);
        }
         
        $path = public_path() . '/uploads/images/';
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        while(file_exists($path.$fileName))
        {
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        }
        $file->move($path, $fileName);
    
        $fullname = $path.$fileName;

        return response()->json([ 'fileName' => $fileName, 'uploaded' => true, 'url' => '/api/ShowImg/'.$fileName, ]);
    }

    public function ShowImg($fileName){
        $path = public_path().'/uploads/images/'.$fileName;
        return Response::file($path);        
    }

}
