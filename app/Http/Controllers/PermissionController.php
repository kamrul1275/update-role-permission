<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    function Index(){
       
        $permissions = Permission::latest()->get();

        //return $permissions;
        return view('backend.permission.index',compact('permissions'));
    }//end method


    function CreatePermission(){
       
        $roles = Role::get();

        //dd($roles);

        return view('backend.permission.create',compact('roles'));
    }//end method




    function Store(Request $request){
       
        $permissions = new Permission();
 
        $permissions->name = $request->name;

        //return $permissions;
        $permissions->save();
 
        return redirect('/permission');
       
    }//end method

    
    function Delete($id)
    {

        $data = Permission::find($id);
        $data->delete();
        return redirect()->back()->with('msg', 'delete.....!');
    } //end method


    function AccessPermission(){

             return view('permission.access');

    }//end method


    function AccessPermissionStore(Request $request){

        return $request->all();

}//end method

function permissionView(){
    return view('frontend.permission.view');
 }//end method
 
 



function PermissionCreate(){

    return view('frontend.permission.create');
}//end method


function permissionEdit(){
    return view('frontend.permission.edit');
}

function permissionDelete(){

    return view('frontend.permission.delete');
}



}
