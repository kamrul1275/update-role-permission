<?php

namespace App\Http\Controllers\api_controller\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
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
   

     public function store(Request $request)
     {
         // Start a database transaction
         DB::beginTransaction();
     
         try {
             // Create the role
             $role = Role::create([
                 'name' => $request->name,
             ]);
             
             $permissions = $request->input('selectedPermissionsValues');
            //  return $permissions;

             // Get and sanitize the permissions from the request
            //  $permissions = json_decode($request->input('selectedPermissionsValues', '[]'), true);
            //  return $permissions;
             // Attach each selected permission to the role
             foreach ($permissions as $permissionId) {
                 $permission = Permission::find($permissionId);
                 if ($permission) {
                     $role->permissions()->attach($permission);
                 }
             }
     
             // Commit the transaction
             DB::commit();
     
             return response()->json([
                 'message' => 'Role and permissions created successfully',
                 'data' => $role,
                 
             ]);
         } catch (\Exception $e) {
             // Rollback the transaction in case of an error
             DB::rollback();
     
             return response()->json([
                 'message' => 'Error creating role and permissions',
                 'error' => $e->getMessage(),
             ], 500);
         }
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
