<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestContoller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectPlanController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\AppConfigurationController;

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
Route::post('test', [TestContoller::class, 'test'])->name('test');

//Statistiques
Route::get('statistiques/projects/count', [StatistiqueController::class, 'projectCount'])->name('statistiques.projects.count');
Route::get('statistiques/project-plans/count', [StatistiqueController::class, 'projectPlanCount'])->name('statistiques.project-plans.count');

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

    //Project Plans
    Route::post('project-plans/search', [ProjectPlanController::class, 'search'])->name('project-plans.search');
    Route::apiResource('project-plans', ProjectPlanController::class);
});
