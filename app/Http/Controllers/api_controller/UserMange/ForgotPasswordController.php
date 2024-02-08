<?php

namespace App\Http\Controllers\api_controller\UserMange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPaswordMail;
use PhpParser\Node\Stmt\TryCatch;
use Exception;

class ForgotPasswordController extends Controller
{
    function  ForgetPaswordSend(Request $request){


//return "oky";

      
  
try{

        $email = $request->input('email');
        $otp = rand(1000,9999);
        
        $count=User::where('email','=',$email)->count();
        
        // if($count==1){
        //opt senad
        
        Mail::to($email)->send(new ForgetPaswordMail($otp));
        
        //otp insert table
        
        // User::where('email',$email)->update([
        //     'otp'=>$otp,
        // ]);
        
        
        return response()->json([
            'status' => 'success',
            'message' => 'Send Successfully ',
        ]);
        
    }catch(Exception $e){
        
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                
            ]);
        
        }
        



    }//end  method

}