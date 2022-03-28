<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Edit(Request $request)
    {
        $fileName = public_path() . '/uploads/blog/Contact.blog';
        $fileContact = file_put_contents($fileName,$request->editorData);
        return $request->editorData;
    }

    public function Show()
    {
        $path = public_path() . '/uploads/blog/';
        return file_get_contents($path.'Contact.blog');
        $fileContact = fopen($path.'Contact.blog', 'a+');
    }
}
