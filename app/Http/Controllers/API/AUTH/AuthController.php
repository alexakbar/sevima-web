<?php

namespace App\Http\Controllers\API\AUTH;

use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                if($user->save()){
                  $response['data'] = $user;
                  $response['error'] = false;
                  $response['message'] = "Success";
                  $response['token'] =  $response['data']->createToken('Token')->accessToken;
                  return response()->json($response, 200);
                }
            } elseif (!$user) {
              $response['error'] = true;
              $response['token'] =  null;
              $response['message'] = "Please double-check your email";
              return response()->json($response, 400);
            } else {
                $response['error'] = true;
                $response['token'] =  null;
                $response['message'] = "Sorry, your password was incorrect. Please double-check your password.";
                return response()->json($response, 400);
            }
        } else {
            $response['error'] = true;
            $response['token'] =  null;
            $response['message'] = "Please check your field";
            return response()->json($response, 400);
        }
    }

    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->passes()) {

          $user = new User();
          $user->fullname = $request->fullname;
          $user->username = $request->username;
          $user->email = $request->email;
          $user->phone = $request->phone;
          $user->password = Hash::make($request->password);

          if ($user->save()) {
            $response['data'] = $user;
            $response['error'] = false;
            $response['message'] = "Success create an account";
            return response()->json($response, 200);
          }

        } else {
            $response['error'] = true;
            $response['token'] =  null;
            $response['message'] = "Please check your field";
            return response()->json($response, 400);
        }
    }
}
