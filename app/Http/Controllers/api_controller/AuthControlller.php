<?php

namespace App\Http\Controllers\api_controller;
use App\Http\Resources\User as UserResource;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthControlller extends Controller
{



    public function index()
    {

        if (Auth::check()) {

            $userinfo = Auth::user();
            return new UserResource($userinfo);
    }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            $permissions = [];
    
            if ($user->status == 'active' && $user->role !== null) {
                $permissions = $user->role->permissions;
            }
    
            return response()->json([
                'status' => true,
                'user' => $user,
                'permissions' => $permissions,
                'authorization' => [
                    'token' => $user->createToken('ApiToken')->plainTextToken,
                    'type' => 'bearer',
                ],
            ]);
        }
    
        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }
    




    // register part

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ]);
    } //end method



    // logout part

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    } //end method

    public function userChangePassword(Request $request){

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Check if the provided old password matches the current password
        if (!Hash::check($request->old_password, auth()->user()->password)){
            return response()->json(['error' => 'The provided current password is incorrect.'], 422);
        }
    
        // Retrieve the authenticated user
        $user = auth()->user();
    
        // Update the user's password
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    
        return response()->json(['message' => 'Password changed successfully.'], 200);
    }
    

}
