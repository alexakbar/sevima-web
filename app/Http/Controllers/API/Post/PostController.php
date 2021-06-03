<?php

namespace App\Http\Controllers\API\Post;

use App\Entities\Post;
use App\Entities\Like;
use App\Entities\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helper\UploadImage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $response['data'] = Post::get();
      $response['error'] = false;
      $response['message'] = "Success";

      return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'image' => 'required',
          'text' => 'required',
        ]);

        if ($validator->passes()) {
          $post =  new Post();
          if (!empty($request->file('image'))) {
            $post->image = UploadImage::single($request->image, 'random', Post::$directory_image);
          }
          $post->text = $request->text;
          $post->is_turn_of_comment = $request->is_turn_of_comment;
          $post->is_turn_of_like = $request->is_turn_of_like;

          $post->user_id = $request->user()->id;

          if ($post->save()) {
            $response['error'] = false;
            $response['message'] = "Success";

            return response()->json($response, 200);
          }
        }else{
          $response['error'] = true;
          $response['message'] = "Please check your field";
          return response()->json($response, 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $response['data'] = Post::find($id);
      $response['error'] = false;
      $response['message'] = "Success";

      return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
          'text' => 'required',
        ]);

        if ($validator->passes()) {
          $post =  Post::find($id);
          if (!empty($request->file('image'))) {
            if ($this->is_file_exists($post->image)) {
                  unlink($post->image);
              }
              $post->image = UploadImage::single($request->image, 'random', Post::$directory_image);
            }
          $post->text = $request->text;
          $post->is_turn_of_comment = $request->is_turn_of_comment;
          $post->is_turn_of_like = $request->is_turn_of_like;

          if ($post->save()) {
            $response['error'] = false;
            $response['message'] = "Success";

            return response()->json($response, 200);
          }
        }else{
          $response['error'] = true;
          $response['message'] = "Please check your field";
          return response()->json($response, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post =  Post::find($id);
      if ($this->is_file_exists($post->image)) {
        unlink($post->image);
      }
      if ($post->delete()) {
        $response['error'] = false;
        $response['message'] = "Success";

        return response()->json($response, 200);
      }
    }

    public function Like(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'post_id' => 'required',
        ]);

        if ($validator->passes()) {
          $post =  new Like();
          $post->user_id = $request->user()->id;
          $post->post_id = $request->post_id;

          if ($post->save()) {
            $response['error'] = false;
            $response['message'] = "Success";

            return response()->json($response, 200);
          }
        }else{
          $response['error'] = true;
          $response['message'] = "Please check your request";
          return response()->json($response, 400);
        }
    }

    public function UnLike(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'post_id' => 'required',
        ]);

        if ($validator->passes()) {
          $post =  Like::where('post_id',$request->post_id)->where('user_id',$request->user()->id)->first();

          if ($post->delete()) {
            $response['error'] = false;
            $response['message'] = "Success";

            return response()->json($response, 200);
          }
        }else{
          $response['error'] = true;
          $response['message'] = "Please check your request";
          return response()->json($response, 400);
        }
    }

    public function Comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'post_id' => 'required',
        ]);

        if ($validator->passes()) {
          $post =  new Comment();
          $post->text = $request->text;
          $post->user_id = $request->user()->id;
          $post->post_id = $request->post_id;

          if ($post->save()) {
            $response['error'] = false;
            $response['message'] = "Success";

            return response()->json($response, 200);
          }
        }else{
          $response['error'] = true;
          $response['message'] = "Please check your request";
          return response()->json($response, 400);
        }
    }

    function is_file_exists($file)
    {
        return $file !== null && is_file($file);
    }
}
