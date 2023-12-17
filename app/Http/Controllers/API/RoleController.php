<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return Inertia::render('Admin/Permissions/Index',compact('permissions'));
    }
    
    public function store(Request $request){
        $validated = $request->validate(['name' => 'required']);
        Permission::create($validated);

        return to_route('admin.permissions.index')->with('message','permission added successfully');
    }
  
     public function update(Request $request, Permission $permission){
        $validated = $request->validate(['name' => 'required']);
        $permission->update($validated);
        return to_route('admin.permissions.index')->with('message','permission edited successfully');
    }
    public function destroy(Permission $permission){
        $permission->delete();
        return to_route('admin.permissions.index')->with('message','permission deleted successfully');
    }
}
