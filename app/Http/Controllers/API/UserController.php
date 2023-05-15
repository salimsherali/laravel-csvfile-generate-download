<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    
    public function login(Request $request)
    {
        try {
            
            $validator = Validator::make($request->all(), [
                'password' => 'required',
                'email' => 'required',
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'response' => false,
                    'result' => [],
                    'message' => $validator->errors()
                ], 403);
            }
        
            if (!Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                return response()->json([
                    'response' => false,
                    'result' => [],
                    'message' => "Invalid credentials!"
                ], 403);
            }
        
            $user = Auth::user();
            $token = $user->createToken(env('Token_Key'))->accessToken;
            $result['token'] = $token;
            $result['user'] = [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
            ];
        
            return response()->json([
                'response' => true,
                'result' => $result,
                'message' => "Success!"
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'response' => false,
                'result' => [],
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
