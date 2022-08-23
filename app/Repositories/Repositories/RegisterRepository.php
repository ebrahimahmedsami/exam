<?php

namespace App\Repositories\Repositories;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\BaseInterface;
use App\Repositories\Interfaces\RegisterInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterRepository  implements RegisterInterface
{
    public function register($request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|confirmed',
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function login($request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Email / Password Required',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(Auth::attempt($request->only(['email', 'password']))){
                $user = User::where('email', $request->email)->first();
                return response()->json([
                    'status' => true,
                    'user' => $user,
                    'message' => 'User Logged In Successfully',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);


        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}