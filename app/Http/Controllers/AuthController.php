<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;   
class AuthController extends Controller
{
    public function __construct()

   {

     $this->middleware('JWT', ['except' => ['login','signup']]);
   
    
    } 

   /**
    * Get a JWT token via given credentials.
    *
    * @param  \Illuminate\Http\Request  $request
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function login(Request $request)
   {
       $credentials = $request->only('email', 'password');

       if ($token = auth()->claims(['name' => 'Uzair Durrani', 'InVoice num'=> '90963848400'])->attempt($credentials)) {
           return $this->respondWithToken($token);
       }

       return response()->json(['error' => 'Unauthorized'], 401);
   }

//user Register..
   public function signup(Request $request) {

        
        User::create($request->all());
        return $this->login($request);
   }

   /**
    * Get the authenticated User
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function me()
   {
       return response()->json(auth()->user());
   }

   /**
    * Log the user out (Invalidate the token)
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function logout()
   {
       auth()->logout();

       return response()->json(['message' => 'Successfully logged out']);
   }

   /**
    * Refresh a token.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function refresh()
   {
       return $this->respondWithToken(auth()->refresh());
   }

   /**
    * Get the token array structure.
    *
    * @param  string $token
    *
    * @return \Illuminate\Http\JsonResponse
    */
   protected function respondWithToken($token)
   {
       return response()->json([
           'access_token' => $token,
           'token_type' => 'bearer',
           'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()->name

       ]);
   }

   public function payload()
   {

      return auth()->payload();

   }
   
    
}
