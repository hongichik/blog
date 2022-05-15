<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function FeedbackPost(Request $request)
    {
        return (bool) Feedback::create($request->all());
    }
}
