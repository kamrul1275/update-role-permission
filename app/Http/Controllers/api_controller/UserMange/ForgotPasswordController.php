<?php

namespace App\Http\Controllers\api_controller\UserMange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPaswordMail;
use PhpParser\Node\Stmt\TryCatch;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon; 

class ForgotPasswordController extends Controller
{
    function  ForgetPaswordSend(Request $request){


//return "oky";

      
  
// try{

//         $email = $request->input('email');
//         $otp = rand(1000,9999);
        
//         $count=User::where('email','=',$email)->count();
        
//         // if($count==1){
//         //opt senad
        
//         Mail::to($email)->send(new ForgetPaswordMail($otp));
        
//         //otp insert table
        
//         // User::where('email',$email)->update([
//         //     'otp'=>$otp,
//         // ]);
        
        
//         return response()->json([
//             'status' => 'success',
//             'message' => 'Send Successfully ',
//         ]);
        
//     }catch(Exception $e){
        
//             return response()->json([
//                 'status' => 'fail',
//                 'message' => $e->getMessage(),
                
//             ]);
        
//         }
        



   // }//end  method





   $request->validate([
    'email' => 'required|email|exists:users',
]);

$token = Str::random(64);

DB::table('password_resets')->insert([
    'email' => $request->email, 
    'token' => $token, 
    'created_at' => Carbon::now()
  ]);

 // Mail::to($email)->send(new ForgetPaswordMail($otp));

  //Mail::to($email)->send(new ForgetPaswordMail(['token' => $token]));

Mail::send('forgetPassword', ['token' => $token], function($message) use($request){
    $message->to($request->email);
    $message->subject('Reset Password');
});

//return back()->with('message', 'We have e-mailed your password reset link!');
return response()->json([

    'message'=>'We have e-mailed your password reset link!',
    'data'=>$token,

]);
}










    public function showResetPasswordForm($token) { 
        return view('auth.forgetPasswordLink', ['token' => $token]);
     }//end method

     public function submitResetPasswordForm(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required'
         ]);
 
         $updatePassword = DB::table('password_resets')
                             ->where([
                               'email' => $request->email, 
                               'token' => $request->token
                             ])
                             ->first();
 
         if(!$updatePassword){

            return response()->json([

                'message'=>'error', 'Invalid token!',
                'data'=>$updatePassword,
        
            ]);
           
         }
 
         $user = User::where('email', $request->email)
                     ->update(['password' => Hash::make($request->password)]);

         DB::table('password_resets')->where(['email'=> $request->email])->delete();

         return response()->json([

            'message'=>'Your password has been changed!',
            'data'=>$user,
    
        ]);
 
         
     }//end method

}