<?php

namespace App\Http\Controllers\api_controller\UserMange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{


//     public function indexPage()
//     {
//         $users = User::get();

//         return response()->json([

//             'message'=>'All User',
//             'data'=>$users,
    
//         ]);
//     }// end method



//     public function userStore(Request $request)
//     {

//         $request->validate([
//             'name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
//             'password' => ['required', 'confirmed', Rules\Password::defaults()],
//             'role'=>['required'],
//         ]);


//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//              'role_id' => $request->role_id,

//         ]);

    
// //dd($user);


// return response()->json([

//     'message'=>'User Create Succesfully',
//     'data'=>$user,
//     //'dataImage'=>$product_images,
// ]);
//     }



}
