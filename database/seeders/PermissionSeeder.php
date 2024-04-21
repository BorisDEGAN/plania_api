<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
  public function run()
  {
    $everybody = Role::ROLE_ALIASES;
    $voyage = Role::COLLABORATOR_ROLE_ALIAS;
    $admin = Role::ADMIN_ROLE_ALIAS;

    $permissions = [

      ...$this->createPermissions('user_management', ['access', 'list'], $everybody),

      ...$this->createPermissions('otp', ['can_use' => "Pouvoir utiliser la connexion OTP"], $everybody),
      ...$this->createPermissions('password', ['can_change' => "Pouvoir changer son mot de passe"], $everybody),

      ...$this->createPermissions('app_configuration', ['create', 'edit', 'delete', 'access'], $everybody),
      ...$this->createPermissions('app_configuration', ['show', 'search', 'list'], $everybody),

      ...$this->createPermissions('permission', ['create', 'edit', 'delete', 'manage'], $everybody),
      ...$this->createPermissions('permission', ['show', 'access', 'search', 'list'], $everybody),

      ...$this->createPermissions('role', ['create', 'edit', 'delete', 'manage'], $everybody),
      ...$this->createPermissions('role', ['show', 'access', 'search', 'list'], $everybody),

      ...$this->createPermissions('user', ['create', 'edit', 'delete', 'history_access'], $everybody),
      ...$this->createPermissions('user', ['show', 'access', 'search', 'list'], $everybody),

      ...$this->createPermissions('project', ['create', 'edit', 'delete', 'history_access'], $everybody),
      ...$this->createPermissions('project', ['show', 'access', 'search', 'list'], $everybody),

      ...$this->createPermissions('project_plan', ['create', 'edit', 'delete', 'history_access'], $everybody),
      ...$this->createPermissions('project_plan', ['show', 'access', 'search', 'list'], $everybody),
    ];

    Permission::insert($permissions);
  }

  public function createPermissions($resource, $permissions, $default_roles = [], $module = null)
  {
    $result = array_map(function ($permission, $description) use (&$resource, &$default_roles, &$module) {
      if(gettype($permission) == "integer")
      {
        $permission = $description;
        $description = null;
      }
      $item = [
        "title" => $resource . '_' . $permission,
        "resource" => $resource,
        "module" => $module,
        "description" => $description,
        "action" => $permission,
        "default_roles" => json_encode($default_roles)
      ];
      return $item;
    }, array_keys($permissions),   $permissions);

    return $result;
  }
}
