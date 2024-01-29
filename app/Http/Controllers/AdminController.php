<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    function adminLogin()
    {
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




    function rolePending()
    {


        $users =  User::where('play', 'user')->where('status', 'inactive')->with('role')->get();
//return  $user ;
       // $users = json_decode($user, true);

        //return  $users ;
        return view('backend.role.pending_role', compact('users'));
    } //end method




    function peddingApproval($id)
    {

        $roles = User::find($id);


        if ($roles->status == 'inactive') {

            $roles->status = 'active';

            $roles->save();

            return redirect('/admin/role/approval')->with('msg', 'Approve Successfully');
        }
    } //end method


    function roleApproval()
    {


        $users =  User::where('status', 'active')->with('role')->latest()->get();

        //return   $user;
        // $users = json_decode($user, true);
        return view('backend.role.approval', compact('users'));
    } //end method

    function approvePendding($id)
    {

        $roles = User::find($id);

        //dd($roles);

        if ($roles->status == 'active') {

            $roles->status = 'inactive';

            //dd($roles);

            $roles->save();

            return redirect('/admin/role/pendding')->with('msg', 'pending Successfully');
        }
    } //end method




    ###### User Mnage Part..............

    public function userIndex()
    {
        $users = User::latest()->get();

        return view('backend.user_manage.all_user',compact('users'));

       
    } // end method



    public function userCreate(){

        $roles = Role::get();
    return view('backend.user_manage.create_user',compact('roles'));

   }//end method




function UserStoreM(Request $request){
// return $request->all();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'status'=>'active',

        ]);


        return redirect('/all/user')->with('User Create Succesfully');

}







    public function userEdit($id)
    {

        $roles = Role::get();
        $users = User::find($id);

        return view('backend.user_manage.edit_User',compact('roles'));

       
    } // end method



    public function userUpdate(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
        ]);

        $user = User::updated([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,

        ]);

        //dd($user);
        return redirect('/alluser')->with('User Update Succesfully');
    }//end method



    public function userDelete($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect()->back()->with('msg','User delete Succesfully');

       
    } // end method



}
