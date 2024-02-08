<?php

namespace App\Http\Controllers\api_controller\UserMange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserProfileController extends Controller
{
 function UserProfile(Request $request, User $user){

   
//return "oky";

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'phone' => 'nullable|string|max:20',
        // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size as needed
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;

    // if ($request->hasFile('photo')) {
    //     $image = $request->file('photo');
    //     $imageName = time().'.'.$image->extension();
    //     $image->move(public_path('upload/user'), $imageName);
    //     $user->photo = $imageName;
    // }

    $user->save();

    return response()->json(
        ['message' => 'Profile updated successfully',
         'data' => $user]
    );
}//end method



function resetPassword(){

    return "resert passwprd";
}//end method




    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        //return  $user;

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return response()->json(['error' => 'The provided current password is incorrect.'], 422);
        }

        $user->password = Hash::make($request->password);
//return  $user;

        $user->save();

        return response()->json(['message' => 'Password changed successfully.'], 200);
    
}//end method



 
}
