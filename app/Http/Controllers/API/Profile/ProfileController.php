<?php

namespace App\Http\Controllers\API\Profile;

use App\Entities\User;
use App\Entities\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Profile(Request $request)
    {
        $user = User::find($request->user()->id);

        $response['data'] = $user;
        $response['error'] = false;
        $response['message'] = "Success";
        return response()->json($response, 200);
    }

    public function Gallery(Request $request)
    {
        $posts = Post::where('user_id',$request->user()->id)->get();
      
        $response['data'] = $posts;
        $response['error'] = false;
        $response['message'] = "Success";
        return response()->json($response, 200);
    }
}
