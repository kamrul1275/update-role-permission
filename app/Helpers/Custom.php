<?php




function isPermission($slug=null){


    //echo "working...";

    if(auth()->check()){
        $permissions = [];
        collect(request()->user()->roles)->each(function($role) use (&$permissions){
            $permissions = array_merge($permissions, $role->permissions->pluck('name')->toArray());
        });

        dd($permissions);
        return in_array($slug, $permissions);
    }
}
