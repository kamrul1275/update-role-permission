<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;

class AdminController extends Controller
{
    function adminLogin(){
        return view('backend.auth.login');
    }


    public function AdminPostLogin(Request $request)

{
    $request->validate([

        'email' => 'required',
        'password' => 'required',
    ]);



    //dd($request->all());

    $request->session()->regenerate();

    //dd($request->session()->regenerate());

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {

        return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD)->withSuccess('Admin Successfully loggedin');
    }

    return redirect("/admin/login")->withSuccess('Oppes! You have entered invalid credentials');
}



// end admin login



    public function AdminDashboard()

    {

        //$roles = Role::latest()->get();
        return  view('backend.layout.dashboard');
    }



    public function Adminlogout()
    {
        Auth::logout();
        return Redirect()->route('admin.login');
    } //end method




    function rolePending(){


        $user =  User::where('role','user')->where('status','inactive')->with('role')->get();
//return  $users ;
       $users= json_decode($user, true);

       //return  $users ;
        return view('backend.role.pending_role',compact('users'));
    }//end method




    function peddingApproval($id)
    {

        $roles = User::find($id);

        //dd($roles);

        if ($roles->status == 'inactive') {

            $roles->status = 'active';

            //dd($roles);

            $roles->save();

            return redirect('/admin/role/approval')->with('msg', 'Approve Successfully');
        }
    } //end method


    function roleApproval(){


        $user =  User::where('role', 'user')->where('status', 'active')->with('role')->latest()->get();
        $users= json_decode($user, true);
        return view('backend.role.approval',compact('users'));
    }//end method

    function approvePendding($id)
    {

        $roles = User::find($id);

        //dd($roles);

        if ($roles->status == 'active') {

            $roles->status = 'inactive';

            //dd($roles);

            $roles->save();

            return redirect('/admin/role/pendding')->with('msg', 'penddind Successfully');
        }
    } //end method

}
