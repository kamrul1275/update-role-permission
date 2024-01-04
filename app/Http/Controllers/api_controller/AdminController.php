<?php

namespace App\Http\Controllers\api_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//return "working";


        if (Auth::check()) {

            $userinfo = Auth::user();


            // return $userinfo;


            if ($userinfo->role !== null) {
                $user = $userinfo->role->name;

                $permissions = $userinfo->role->permissions->pluck('name')->toArray();


                //return  $permissions;

         return response()->json([

            'message'=>'All Permission List',
            'data'=>$permissions,
                ]);

                // $view->with('userPermissions', $permissions);
            }
             else {
                // Handle the case where 'role' is null for the user
                // You can set default permissions or perform other actions as needed
                return response()->json(['message' => 'Unauthorized'], 403); // Setting an empty array as default permissions
            }


      }
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
