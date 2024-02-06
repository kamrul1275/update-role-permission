<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission; // Import your Permission model
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    function RoleIndex()
    {
        $roles = Role::latest()->get();

        return view('backend.role.index', compact('roles'));
    }

    //end method

    function Create()
    {
        $permissions = Permission::latest()->get();
        return view('backend.role.create', compact('permissions'));
    } //end method



    function Store(Request $request)
    {

        $user = Role::create([
            'name' => $request->name,


        ]);

        //dd($user);
        $post_users = $request->input('permissions');
        //dd($post_users );
        //$post_users = $request->input('roles');

        if ($post_users !== null) {
            $permissions = [];
            foreach ($post_users as $key => $val) {
                $permissions[intval($val)] = intval($val);
            }

            $user->permissions()->sync($permissions);

            return redirect()->back();
        }
    }


    function Delete($id)
    {
        $data = Role::find($id);
        $data->delete();


        return redirect()->back()->with('msg', 'delete.....!');
    } //end method





    function indexx(User $user)
    {
        if (!Gate::allows('view', $user)) {
            abort(403);
        }
        return "Authorize";
    }//end method


//     public function example() {
//         $result = isPermission('Hello, World!');
// dd($result);


//         //return view('example', ['result' => $result]);
//     }








}
