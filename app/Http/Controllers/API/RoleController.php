<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    

    public function index(){
        try {
            $roles = Role::all();
            return response()->json($roles, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
       
    }

    
    public function store(Request $request){
        $validated = $request->validate(['name' => 'required']);
        Role::create($validated);

        return to_route('admin.roles.index')->with('message','role added successfully');
    }
    public function edit(Role $role){
        $assignedPermission = $role->permissions;
        // $permissions = Permission::all();
      
    }
    public function update(Request $request, Role $role){
        $validated = $request->validate(['name' => 'required']);
        $role->update($validated);
        return to_route('admin.roles.index')->with('message','role edited successfully');
    }
    public function destroy(Role $role){
        $role->delete();
        return to_route('admin.roles.index')->with('message','role deleted successfully');
    }
    public function givePermission(Request $request, Role $role){
        if($role->hasPermissionTo($request->permissionName)){
            return back()->with('message', 'permission already assigned');
        }

        $role->givePermissionTo($request->permissionName);
        return back()->with('message', 'permission  assigned');
    }
    // public function revokePermission(Role $role, Permission $permission){
    //     if($role->hasPermissionTo($permission)){
    //         $role->revokePermissionTo($permission);
    //         return back()->with('message', 'permission revoked');
    //     }
    //     return back()->with('message', 'no such permission');
    // }

}
