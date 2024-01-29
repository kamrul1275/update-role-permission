<?php

namespace App\Http\Controllers\api_controller;

use App\Http\Resources\User as UserResource;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{





    public function index()
    {

        if (Auth::check()) {

            $userinfo = Auth::user();

            if ($userinfo->status == 'active') {
                if ($userinfo->role !== null) {
                    $user = $userinfo->role->name;

                    $permissions = $userinfo->role->permissions->pluck('name')->toArray();


                    return response()->json($permissions);
                } else {
                    // Handle the case where 'role' is null for the user
                    // You can set default permissions or perform other actions as needed
                    return response()->json(['message' => 'Unauthorized'], 403); // Setting an empty array as default permissions
                }
            }
        }
    }
    //end method




}
