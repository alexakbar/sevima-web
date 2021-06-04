<?php

namespace App\Http\Controllers\API\Profile;

use App\Entities\User;
use App\Entities\Post;
use App\Entities\Like;
use App\Entities\Comment;
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
        $posts = Post::where('user_id',$request->user()->id)->orderBy('created_at','DESC')->get();

        $response['data'] = $posts;
        $response['error'] = false;
        $response['message'] = "Success";
        return response()->json($response, 200);
    }

    public function GalleryVertical(Request $request)
    {
      $posts = Post::where("user_id",$request->user()->id)->get();
      $data = [];
      foreach ($posts as $key => $post) {
        $likes = Like::where('post_id',$post->id)->orderBy('created_at','DESC')->limit(2)->get();
        $isLike = Like::where('user_id',$request->user()->id)->where('post_id',$post->id)->first();
        $dataLike = [];
        foreach ($likes as $key => $like) {
          $dataLike[] = $like->user;
        }
        $comment = Comment::where('post_id',$post->id)->with('user')->orderBy('created_at','DESC')->limit(2)->get();
        $data[] = array(
          'id' => $post->id,
          'image' => $post->image,
          'is_turn_of_comment' => $post->is_turn_of_comment,
          'is_turn_of_like' => $post->is_turn_of_like,
          'text' => $post->text,
          'is_like' => $isLike ? true : false,
          'total_like' => $post->like->count(),
          'likers' => $dataLike,
          'total_comment' => $post->comment->count(),
          'comment' => $comment,
          'user' => $post->user
        );
      }

      $response['data'] = $data;
      $response['error'] = false;
      $response['message'] = "Success";

      return response()->json($response, 200);
    }
}
