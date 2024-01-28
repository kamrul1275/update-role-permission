<?php

namespace App\Http\Controllers\api_controller\UserMange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function indexPage()
    {
        $users = User::get();

        return response()->json([

            'message'=>'All User',
            'data'=>$users,
    
        ]);
    }
}
