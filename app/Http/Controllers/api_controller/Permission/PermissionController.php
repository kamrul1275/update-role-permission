<?php

namespace App\Http\Controllers\api_controller\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::all();

        return response()->json([

            'message' => 'Permission List',
            'data' => $permissions,

        ]);

    } //end method




    public function getTotalPermissions() {
        $totalPermissions = Permission::count();
    
        // Now you can use $totalUsers in your code as needed
       // return view('your_view')->with('totalUsers', $totalUsers);
        return response()->json([
    
            'message'=>'All Permission',
            'data'=>$totalPermissions,
    
        ]);
    }
    
    




    public function store(PermissionRequest $request)
    {   
        $permission = new Permission();
        $permission->name= $request->name;
        $permission->save();
        $msg="Permission add succesfully";
        return response()->json(['success'=>$msg],201);
    }//end method


    public function update(UpdatePermissionRequest $request, Permission $permission )
    {
        $permission->name= $request->name;
        $permission->save();
        $msg="Permission update succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Permission $permission)
    {
        $permission->delete();
        $msg="Permission Delete succesfully";
        return response()->json(['success'=>$msg],200);
    }//end method





}
