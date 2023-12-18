<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        
        try {
            $permissions = Permission::all();
            return response()->json($permissions, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        
    }
    
    public function store(Request $request){
        $validated = $request->validate(['name' => 'required']);
        Permission::create($validated);

    }
  
     public function update(Request $request, Permission $permission){
        $validated = $request->validate(['name' => 'required']);
        $permission->update($validated);
        
    }
    public function destroy(Permission $permission){
        $permission->delete();

    }
}
