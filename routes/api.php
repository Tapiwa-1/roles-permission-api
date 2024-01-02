<?php

use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {

    // Route::get('/logged-in-user', [UserController::class, 'loggedInUser']);
    // Route::post('/update-user-image', [UserController::class, 'updateUserImage']);
    // Route::patch('/update-user', [UserController::class, 'updateUser']);

    Route::get('/get-profile', [ProfileController::class, 'getProfile']);
    Route::get('/edit-profile', [ProfileController::class, 'edit']);
    Route::patch('/update-profile', [ProfileController::class, 'update']);
    Route::patch('/update-password-profile', [ProfileController::class, 'updatePassword']);
    Route::patch('/destroy-profile', [ProfileController::class, 'destroy']);

    
});

Route::middleware(['auth:sanctum','role:admin'])->group(function () {

    Route::get('/get-roles',[ RoleController::class, 'index']);
    Route::get('/add-role/{role}',[ RoleController::class, 'store']);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission']);
    // Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    // Route::resource('/permissions', PermissionController::class);
    // Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.role');
    // Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    // Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    // Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    // Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    // Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});
