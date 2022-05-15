<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function GetFeedback()
    {
        return Feedback::all();
    }

    public function DeleteFeedback(Request $request)
    {
        // return $request->id;
        return (bool)Feedback::where('id',$request->id)->delete();
        
    }
}
