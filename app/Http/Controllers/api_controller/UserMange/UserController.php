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


    public function indexPage()
    {
        $users = User::get();

        return response()->json([

            'message'=>'All User',
            'data'=>$users,
    
        ]);
    }// end method



    public function createPage(Request $request)

    {


//return "working";


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role_id' => ['required'],
            'password' => ['required'],
           
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
          
           
        ]);

    //return $user;



        return response()->json([

            'message'=>'User Create Succesfully',
            'data'=>$user,
            //'dataImage'=>$product_images,
        ]);
            }
//end method




public function editPage($id)
{

   // return "working";
    $users = User::find($id);

    return response()->json([

        'message'=>'Edit User',
        'data'=>$users,

    ]);
}// end method



public function updatePage(Request $request,$id)

    {


 //return "working";


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
           
        ]);

        $user = User::find($id);

        if( $user){

            $user->updated([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
               
            ]);
    
        
    //dd($user);
    //$users = User::find($id);
    

            return response()->json([
                'status'=>200,
                'message'=>'User Update Succesfully',
                'data'=>$user,
                //'dataImage'=>$product_images,
            ],200);

        }else{

            return response()->json([
                'status'=>404,
                'message'=>'no found user',
                'data'=>$user,
                //'dataImage'=>$product_images,
            ]);
        }


   
            }
//end method


public function DeletePage($id)
{

   // return "working";
    $user = User::find($id);
    $user->delete();
    return response()->json([

        'message'=>'User Delete Succesfully',
        'data'=>$user,

    ]);
}// end method







public function getTotalUsers() {
    $totalUsers = User::count();

    // Now you can use $totalUsers in your code as needed
   // return view('your_view')->with('totalUsers', $totalUsers);
    return response()->json([

        'message'=>'All User',
        'data'=>$totalUsers,

    ]);
}









}
