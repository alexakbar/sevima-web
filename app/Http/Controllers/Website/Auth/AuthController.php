<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class AuthController extends Controller
{
      public function index()
      {
          if (Auth::check() == true ) {
              return redirect()->route('superadmin.index');
          } else {
              return view('auth.login-admin');
          }
      }

      public function doLogin(Request $request)
      {
          if ($request->ajax()) {
            $credentials = ['email' => $request->email, 'password' => $request->password];
            $rules = [
              'email' => 'required',
              'password' => 'required|min:8|max:16',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($request->email == "admin") {

              if ($validator->fails() || Auth::attempt($credentials) == false) {
                $message = array_merge(['Login Failed!'], $validator->errors()->all());

                return response(['status' => false, 'message' => $message]);
              } elseif ($validator->passes() && Auth::attempt($credentials) == true) {
                $request->session()->regenerate();
                $message = array_merge(['Login Success!'], ['Redirecting page ...']);

                return response(['status' => true, 'message' => $message ]);
              }
            }else{
              $message = array_merge(['Login Failed!'], $validator->errors()->all());

              return response(['status' => false, 'message' => $message]);
            }

          } else {
              return redirect()->route('login');
          }
      }

      public function logout(Request $request)
      {
          Auth::logout();
          $request->session()->flush();
          return redirect()->route('auth.index');
      }
}
