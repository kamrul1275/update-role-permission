<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    function Dashboard()
    {


        // if (Auth::check()) {

        //     Auth::user();
            //$roles =  Auth::user()->role;

           // dd($roles);

            // $permissions = [];
            // foreach ($roles as $role) {
            //     dd($role->permissions);
            //     $permissions = array_merge($role->permissions->toArray(), $permissions);
            // };


            //dd($permissions);  with diya kora jabe


       // $user = User::with('role')->latest()->get();
       // $posts = Post::latest()->get();

        ///return  $users;
        //$users = U::latest()->get();

        return view('layouts.dashboard');// end metho

    //}
 }



function CreateGate(){

    return "Create form";
}//end method



function roleRequest(){


    $roles = Role::get();

return view('role_request',compact('roles'));

}// end method



function roleRequestStore(Request $request){

     $user_id = Auth::user()->id;

    // User::update([
    //     'role_id' => $request->user_id,
    // ]);

    // dd($request->$user_id);

    DB::table('users')->where('id', $user_id)->update([
        'role_id' => $request->user_id,

        // Other fields to update
    ]);
//dd($request->user_id);


    return redirect()->back()->with('msg', 'request added.......!');

}




function rolePages(){

    $id = Auth::user()->id;
    $user =  User::where('id', $id)->where('role', 'user')->where('status', 'active')->with('role')->get();


    $users= json_decode($user, true);
// dd($users);
// return  $users;

return view('role_pages',compact('users'));

}// end method



}
