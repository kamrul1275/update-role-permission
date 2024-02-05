<?php

namespace App\Http\Controllers\api_controller\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
       $roles = Role::all();

       return response()->json([
                
            'message'=>'Role List',
            'data'=>$roles,

       ]);

    }//end method







    public function getTotalRoles() {
        $totalRoles = Role::count();
    
        // Now you can use $totalUsers in your code as needed
       // return view('your_view')->with('totalUsers', $totalUsers);
        return response()->json([
    
            'message'=>'AllRoles',
            'data'=>$totalRoles,
    
        ]);
    }
    



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {   
        $role = new Role();
        $role->name= $request->name;
        $role->save();
        $msg="Role add succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role )
    {
        $role->name= $request->name;
        $role->save();
        $msg="Role update succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $msg="Role Delete succesfully";
        return response()->json(['success'=>$msg],200);
    }//end method
}
