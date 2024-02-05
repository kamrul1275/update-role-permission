<?php

namespace App\Http\Controllers\api_controller\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addRole(Request $request, $id,$roleId)
    {

        // return 'hii';
        $user = User::find($id);

        //return $user;

        $user?->update(['role_id'=>$roleId]);


        return response()->json(
            ['message' => 'Add Role successfully',
                'user' => $user]
        );

    } //end method

    public function userRoleAccess()
    {

        $id = Auth::user()->id;
        //return$id;
        $user = User::where('id', $id)->where('status', 'active')->with('role')->get();

        $users = json_decode($user, true);
        return response()->json($users);

    }//end method



    

}
