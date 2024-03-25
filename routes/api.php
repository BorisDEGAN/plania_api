<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AppConfigurationController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Auth
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::delete('logout', [AuthController::class, 'logout'])->name('logout');

// App Configurations
Route::get('app-configurations', [AppConfigurationController::class, 'index'])->name('app-configurations.index');
Route::post('app-configurations/search', [AppConfigurationController::class, 'search'])->name('app-configurations.search');

Route::group(['middleware' => ['auth:sanctum']], function () {

    //Change Password
    Route::post('change-password', [AuthController::class, 'change_password']);

    //App Configuration
    Route::apiResource('app-configurations', AppConfigurationController::class)->except(['index']);

    // Roles
    Route::apiResource('roles', RoleController::class);
    Route::post('roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');

    // User 
    Route::post('users/search', [UsersController::class, 'search'])->name('users.search');
    Route::apiResource('users', UsersController::class);

    //Permission
    Route::post('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');

    //Permissions Manage
    Route::post('roles/permissions/manage', [PermissionController::class, 'role_manage']);

    //Projects
    Route::post('projects/search', [ProjectController::class, 'search'])->name('projects.search');
    Route::apiResource('projects', ProjectController::class);
});
