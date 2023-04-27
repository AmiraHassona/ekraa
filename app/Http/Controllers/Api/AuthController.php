<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use ResponseTrait;
     /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {
            // return response()->json(['error' => 'Unauthorized'], 401);
             return $this->returnError('Unauthorized');
        }
        // return response()->json(['token' => $token]);
        return $this->returnData('logged successfuly',['token' => $token]);
    }
        /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // protected function respondWithToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //     ]);
    // }

    public function userProfile(){
        $user = Auth::guard('api')->user();
        if(!$user){
            // return response()->json(['error' => 'Unauthorized'], 401);
            return $this->returnError('no user profile');
        }
        // return response()->json([
        //     'id'=>$user->id,
        //     'name'=>$user->name,
        //     'email'=>$user->email,
        //     'role'=>$user->role

        // ]);
        return $this->returnData('user profile', [
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'role'=>$user->role
            ]);

    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        // return response()->json(['message' => 'Successfully logged out']);
        return $this->returnSuccess('Successfully logged out');
    }

    public function register(Request $request)
    {
       $validator = Validator::make($request->all() , [
            'name'=>'required|string|min:3|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|confirmed|min:6',
            'level_id'=>'required',
            'department_id'=>'required'
       ]);

       if($validator->fails())
       {
          $errors = [];
          foreach($validator->errors()->getMessages() as $message){
            $error = implode($message);
            $errors[]=$error;
          }
          return $this->returnError(implode(' , ',$errors));
       }
       else
       {
         $user = User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'password'=> Hash::make($request->password)
          ]);

          Student::create([
            'user_id'      =>$user->id,
            'level_id'     =>$request->level_id,
            'department_id'=>$request->department_id
          ]);
          $token = JWTAuth::attempt([
               'email'    => $request->email,
               'password' => $request->password
            ]);
          return $this->returnData('register successfuly',['token' => $token]);
          
        // $user = User::create(array_merge(
        //     $validator->validated(),['password'=>bcrypt($request->password)]
        //    ));
        //    return response()->json([
        //     'message' => 'Successfully registered',
        //     'user' =>$user
        //    ]);

       }
    }
}
